<?php

namespace App\Http\Controllers;

use App\PaymentPlan;
use App\UserPaymentPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// use to process billing agreements
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;

    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function paypalRedirect($id){

        $paymentPlan = PaymentPlan::find($id);

        $desc = $paymentPlan->name." Subscription";

        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('UkumbiTV Monthly Subscription Agreement')
            ->setDescription($desc)
            ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($paymentPlan->paypal_plan_id);

        $agreement->setPlan($plan);


        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
            // Create agreement
            $agreement = $agreement->create($this->apiContext);


            // Extract approval URL to redirect user
            $approvalUrl = $agreement->getApprovalLink();


            return redirect($approvalUrl)->with('planid', $plan->getId());
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function paypalReturn(Request $request){

        $token = $request->token;

        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);


            $user = Auth::user();
            $user->role = 'subscriber';
            $user->paypal = 1;
            if(isset($result->id)){
                $user->paypal_agreement_id = $result->id;
            }
            $user->save();

            $expiry_date = Carbon::now()->addMonth();
            $paymentPlanId = PaymentPlan::where('paypal_plan_id', Session::get('planid'))->first();

            $userPaymentPlan = UserPaymentPlan::where('user_id', Auth::id())->first();
            $userPaymentPlan->payment_plan_id = $paymentPlanId->id;
            $userPaymentPlan->expiry_date = $expiry_date;
            $userPaymentPlan->save();

            if (Auth::user()->subscribed('main')) {
                $this->cancelStripeSubscription();
            }

//            echo 'New Subscriber Created and Billed';
            return redirect()->action('UserController@packages')->with('flash_success' , 'Payment plan was successful updated');

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            return redirect()->action('UserController@packages')->with('flash_error' , 'You have either cancelled the request or your session has expired');
        }
    }

    public function cancelPaymentPlan()
    {
        //Create an Agreement State Descriptor, explaining the reason to suspend.
        $agreementStateDescriptor = new AgreementStateDescriptor();
        $agreementStateDescriptor->setNote("Suspending the agreement");
        try {
            $agree = Agreement::get(Auth::user()->paypal_agreement_id, $this->apiContext);

            $agree->suspend($agreementStateDescriptor, $this->apiContext);
            // Lets get the updated Agreement Object
            $agreement = Agreement::get($agree->getId(), $this->apiContext);
            $user = Auth::user();
            $user->role = $agreement->getState();
            $user->paypal_agreement_id = $agreement->getId();
            $user->save();

            $userPaymentPlan = UserPaymentPlan::where('user_id', Auth::id())->first();
            $userPaymentPlan->payment_plan_id = 2;
            $userPaymentPlan->save();
        } catch (Exception $ex) {
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
            return redirect()->action('UserController@packages')->with('flash_error' , 'Something went wrong, try again later');
        }

        return redirect()->action('UserController@packages')->with('flash_success' , 'Payment plan was successful canceled');
    }

    public function cancelStripeSubscription()
    {
        Auth::user()->subscription('main')->cancel();
    }

}
