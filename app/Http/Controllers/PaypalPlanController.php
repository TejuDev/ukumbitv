<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Used to process plans
use Illuminate\Support\Facades\URL;
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\Payer;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

class PaypalPlanController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;

    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
        }

        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function create_plan(){

        // Create a new billing plan
        $plan = new Plan();
        $plan->setName('VIP Payment Plan')
            ->setDescription('Monthly Subscription to the UkumbiTV')
            ->setType('infinite');

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
            ->setType('REGULAR')
            ->setFrequency('Month')
            ->setFrequencyInterval('1')
            ->setCycles('0')
            ->setAmount(new Currency(array('value' => 5.99, 'currency' => 'USD')));

        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl(URL::to('/').'/subscribe/paypal/return')
            ->setCancelUrl(URL::to('/').'/subscribe/paypal/return')
            ->setAutoBillAmount('yes')
            ->setInitialFailAmountAction('CONTINUE')
            ->setMaxFailAttempts('0');

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        //create the plan
        try {
            $createdPlan = $plan->create($this->apiContext);

            try {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                    ->setPath('/')
                    ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($createdPlan->getId(), $this->apiContext);

                // Output plan id
                echo 'Plan ID:' . $plan->getId();
            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function getPlansList()
    {

        try {


            $params = [
                "page_size" => "3",
                "status" => "ACTIVE",
                "total_required" => "yes"
            ];
//            $planList = Plan::all($params, $this->apiContext);
            $agree = Agreement::get('I-4EY2V7DGPH9P', $this->apiContext);
//            $plan = Plan::get('P-0JB09328YE923024WPFRHONQ', $this->apiContext);
dd($agree);

        } catch (Exception $ex) {

            exit(1);
        }


        return 'sss';
    }


}
