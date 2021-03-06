<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after successful change of password.
     *
     * @var string
     */

    protected $redirectTo = '/';

    /**
     * The password reset request view that should be used.
     *
     * @var string
     */

    protected $linkRequestView = 'r.user.auth.passwords.email';

    /**
     * The password reset view that should be used.
     *
     * @var string
     */

    protected $resetView = 'r.user.auth.passwords.reset';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

}
