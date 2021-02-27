@extends('layouts.auth')

@section('content')
    <div class="container-fluid no-padding h-100">
        <div class="row flex-row h-100 bg-white">
            <!-- Begin Left Content -->
            <div class="col-xl-3 col-lg-5 col-md-5 col-sm-12 col-12 no-padding">
                <div class="elisyam-bg background-03">
                    <div class="elisyam-overlay overlay-08"></div>
                    <div class="authentication-col-content-2 mx-auto text-center">
                        <div class="logo-centered">
                            <a href="{{ route('site.index') }}">
                                <img src="{{asset('assets/cms/img/logo-light.svg')}}" alt="logo">
                            </a>
                        </div>
                        <h2>Онлайн-школа<br>иностранных языков</h2>
                        <ul class="login-nav nav nav-tabs mt-5 justify-content-center">
                            <li><a class="@if(Request::route()->getName() == 'login') active @endif" href="{{route('login')}}">{{ __("Sign In") }}</a></li>
                            <li><a class="@if(Request::route()->getName() == 'register') active @endif" href="{{route('register')}}">{{ __("Sign Up") }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Begin Right Content -->
            <div class="col-xl-9 col-lg-7 col-md-7 col-sm-12 col-12 my-auto no-padding">
                <!-- Begin Form -->
                <div class="authentication-form-2 mx-auto">
                    <div role="tabpanel" class="tab-pane show active" id="singin" aria-labelledby="singin-tab">
                        <h3>{{ __("Sign In") }}</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="group material-input">
                                <input type="text" name="email" value="{{ old('email') }}" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>{{ __("Email") }}</label>
                                @error('email')
                                <small>{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="group material-input">
                                <input type="password" name="password" required>
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>{{ __("Password") }}</label>
                            </div>
                            <div class="row">
                                <div class="col text-left">
                                    <div class="styled-checkbox">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">{{ __("Remember me") }}</label>
                                    </div>
                                </div>
                                <div class="col text-right">
                                    <a href="{{ route('password.request') }}">{{ __("Forgot Password ?") }}</a>
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <button type="submit" class="btn btn-lg btn-gradient-01">
                                    {{ __("Sign In") }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
