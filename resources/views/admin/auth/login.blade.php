@extends('layouts/app')
@section('title', 'Admin Login')
@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/base/app/auth.css')) }}">
@endsection
@section('content')
    <!-- Login-->
    <div class="card d-flex col-lg-3 w-auto px-2 p-lg-2 mx-lg-auto mx-2 py-5" style="margin-top:130px;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-12 p-xl-2 mx-auto">
            <h2 class="title text-center">
                <img src="{{ asset('images/icons/official.png') }}" width="36" style="margin-top:-5px" />
                <strong class=" text-black">Admin Login</strong>
            </h2>
            <form class="auth-login-form mt-2" action="{{route('admin.auth.login')}}" method="POST">
                @csrf
                @if (@session('access_error'))
                    <span class="error">
                        <p><strong>{{ @session('access_error') }}</strong></p>
                    </span>
                @endif
                <div class="form-group">
                    <label class="form-label" for="email">Email / Username</label>
                    <input class="form-control" id="email" type="text" name="email"
                        placeholder="Email or Username" value="{{ old('email') }}" autofocus=""
                        tabindex="1" />
                    @if ($errors->has('email'))
                        <span class="error">
                            <p>{{ $errors->first('email') }}</p>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="d-flex justify-content-between">
                        <label for="login-password">Password</label>
                        <a href="">
                            <small>Forgot Password?</small>
                        </a>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                        <input class="form-control form-control-merge" id="password" type="password" name="password"
                            placeholder="············" aria-describedby="login-password" tabindex="2" />
                        <div class="input-group-append">
                            <span class="input-group-text cursor-pointer">
                                <i data-feather="eye"></i>
                            </span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="error">
                            <p>{{ $errors->first('password') }}</p>
                        </span>
                    @endif
                    @if (@session('error'))
                        <span class="error">
                            <p>{{ @session('error') }}</p>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="remember-me" name="remember" type="checkbox" tabindex="3" />
                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                </div>
                <button class="btn btn-secondary btn-block" tabindex="4">Log in</button>
            </form>
        </div>
    </div>
    <!-- /Login-->
@endsection
@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset(mix('js/scripts/app/auth/login.js')) }}"></script>
@endsection
