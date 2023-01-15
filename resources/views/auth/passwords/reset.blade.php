
@include('layouts.login_header')

<style>
.error{
    color:red;
}
</style>
<section class="login-block">

    <div class="container-fluid">
        <!-- \\\\\\\\\\\\\\\Login container\\\\\\\\\\\\ -->
        <div class="row" id="logincontainer" style="display: none">
            <div class="col-sm-12">

                <form id="login_form" method="post" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img style="width: 100px;border-radius: 100%;height: 100px;"
                            src="{{ URL::asset('assets/images/logo.png') }}" alt="logo.png">
                        <h3>{{strtoupper(env('APP_NAME'))}}</h3>
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Sign in with your regular account</p>
                            <div class="form-group form-primary">
                                <input autocomplete="off" type="email" name="email" class="form-control"
                                    required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>
                            <div class="form-group form-primary">
                                <input autocomplete="off" type="password" name="password" class="form-control"
                                    required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input autocomplete="off" type="checkbox" value="">
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right float-right">
                                        <a onclick="show_forgot()" class="text-right f-w-600"> Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button autocomplete="off" type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                                </div>
                            </div>
                            <p class="text-inverse text-left">Don't have an account?<a onclick="show_register()">
                                    <b>Register here </b></a></p>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <!-- \\\\\\\\\\\\\\\Forgot container\\\\\\\\\\\\ -->
        <div class="row" id="forgotcontainer" style="display: none">
            <div class="col-sm-12">

                <form id="forgot_form" method="post" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img style="width: 100px;border-radius: 100%;height: 100px;"
                            src="{{ URL::asset('assets/images/logo.png') }}" alt="logo.png">
                        <h3>{{strtoupper(env('APP_NAME'))}}</h3>
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Forgot Password</h3>
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Please enter your valid email</p>
                            <div class="form-group form-primary">
                                <input autocomplete="off" type="email" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>

                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button autocomplete="off" type="button"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">SUBMIT</button>
                                </div>
                            </div>
                            <p class="text-inverse text-left"><a onclick="show_login()">
                                    <b>Back to Login</b></a></p>
                        </div>
                    </div>
                </form>

            </div>

        </div>
        <!-- \\\\\\\\\\\\\\\ResetPassword container\\\\\\\\\\\\ -->
        <div class="row" id="resetcontainer" style="display: none">
            <div class="col-sm-12">

                <form id="reset_form" method="POST" action="{{ route('password.update') }}" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img style="width: 100px;border-radius: 100%;height: 100px;"
                            src="{{ URL::asset('assets/images/logo.png') }}" alt="logo.png">
                        <h3>{{strtoupper(env('APP_NAME'))}}</h3>
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Reset Password</h3>
                                </div>
                            </div>
                            <div class="form-group form-primary">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>

                            <div class="form-group form-primary">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            <div class="form-group form-primary">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <span class="form-bar"></span>
                                <label class="float-label">Confirm Password</label>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button autocomplete="off" type="submit"
                                        class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Reset Password</button>
                                </div>
                            </div>
                            <p class="text-inverse text-left"><a href="/login">
                                    <b>Back to Login</b></a></p>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>

    </div>

</section>

@include('layouts.login_footer')
@include('includes.js_scripts.reset_password_js')


