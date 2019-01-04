@extends('auth.design')

@section('content')

<section id="wrapper" class="login-register">
<div class="login-box login-sidebar">
    <div class="white-box"> 
        {{-- =============================== --}}
        {{-- Login Form                      --}}
        {{-- =============================== --}}
        <form id="loginform" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf
            <a href="javascript:void(0)" class="text-center db">
                <img src="{{ asset('uploads/logo/logo_long.png') }}" style="width: 300px; height:50px;" class="m-t-10" alt="Home" />
                <br/>
                  
                {{--
                    this is validation connected to AdminController
                    this is working, just remove all validation in the form.
                 --}}  
                @if($errors->any())
                <div class="alert alert-danger alert-block m-t-40" style="text-align: left">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li><strong>{{ $error }}</strong></li>
                        @endforeach
                    </ul>
                </div>
                @endif 
               

            <div class="form-group m-t-40">
                <div class="col-xs-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="{{ __('E-Mail Address') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="checkbox checkbox-primary pull-left p-t-0">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <a href="{{ route('password.request') }}" id="to-recover" class="pull-right m-t-10"><i class="fa fa-lock m-r-5"></i>
                        {{ __('Forgot Your Password?') }}
                    </a>
                    {{-- <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> --}} 
                </div>
            </div>

            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                    <div class="social">
                        <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                        <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                    </div>
                </div>
            </div>
            <div class="form-group m-b-0">
                <div class="col-sm-12 text-center">
                    <p>Don't have an account? <a href="register2.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div>
        </form>
        {{-- =============================== --}}
        {{-- Recover Password Form           --}}
        {{-- =============================== --}}
        {{-- 
        <form class="form-horizontal" id="recoverform" action="index.html">
            <div class="form-group ">
                <div class="col-xs-12">
                    <h3>Recover Password</h3>
                    <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                </div>
            </div>
            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" required="" placeholder="Email">
                </div>
            </div>
            <div class="form-group text-center m-t-20">
                <div class="col-xs-12">
                    <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
                </div>
            </div>
        </form> 
        --}}
    </div>
</div>
</section>

@endsection
