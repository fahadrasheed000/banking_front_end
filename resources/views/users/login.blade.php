@include('layouts.login_header')

<style>
    .error {
        color: red;
    }

</style>
<section class="login-block">

    <div class="container-fluid">
        <!-- \\\\\\\\\\\\\\\Login container\\\\\\\\\\\\ -->
        <div class="row" id="logincontainer">
            <div class="col-sm-12">

                <form id="login_form" method="POST" action="/login" class="md-float-material form-material">
                    @csrf
                    <div class="text-center">
                        <img style="width: 100px;border-radius: 100%;height: 100px;"
                            src="{{ URL::asset('assets/images/logo.png') }}" alt="logo.png">
                        <h3>{{ strtoupper(env('APP_NAME')) }}</h3>
                    </div>
                    <div class="auth-box card">
                        <div class="card-block">
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center txt-primary">Sign In</h3>
                                </div>
                            </div>
                            <p class="text-muted text-center p-b-5">Sign in with your regular account</p>
                            <div class="form-group form-primary">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-bar"></span>
                                <label class="float-label">Email</label>
                            </div>
                            <div class="form-group form-primary">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary">
                                        <label>
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <span class="cr"><i
                                                    class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right float-right">
                                        <a href="/password/reset" class="text-right f-w-600"> Forgot
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
                          
                        </div>
                    </div>
                </form>

            </div>

        </div>

    </div>

    </div>

</section>

@include('layouts.login_footer')
@include('includes.js_scripts.login_js')
