@extends('r.layouts.simple')
@section('content')
    <div class="signup-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="sign-block">
                        <div class="title-page">Sign Up</div>
                        <div class="text-add">The easiest way for you to sign up is with Facebook</div>
                        <a href="" class="butn butn-large butn-dblue butn-face"><span class="icon icon-facebook"></span>Sign up with Facebook</a>
                        <div class="or-line upper">or</div>
                        <form  action="{{ url('/register') }}" method="POST">
                            <div class="input-wrap">
                                <label>Enter your e-mail <span>*</span></label>
                                <input type="email" name="email" required>
                            </div>
                            <div class="input-wrap">
                                <label>Password<span>*</span></label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="operations-pass">
                                <a href="">Show password</a>
                            </div>
                            <div class="terms-policy">
                                <p>By clicking Sign Up, I agree to the</p>
                                <div>
                                    <a href="{{route('user.terms-condition')}}">Terms of Service</a>
                                    <span>and</span>
                                    <a href="{{route('user.privacy_policy')}}">Privacy policy</a>
                                </div>
                            </div>
                            <button type="submit" class="butn butn-orange butn-large">Sign Up</button>
                        </form>
                        <div class="have-block">
                            <span>Already have an account?</span>
                            <a href="{{route('user.login.form')}}" class="sign-butn">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection