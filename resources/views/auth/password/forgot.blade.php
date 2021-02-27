@extends('layouts.auth')

@section('content')
    <div class="container-fluid h-100 overflow-y">
        <div class="row flex-row h-100">
            <div class="col-12 my-auto">
                <div class="password-form mx-auto">
                    @include('layouts.cms.template-parts.logo-form')

                    <h3>{{ __("Password Recovery") }}</h3>
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="group material-input">
                            <input type="email" name="email" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>{{ __("Email") }}</label>
                        </div>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-lg btn-gradient-01">
                                {{ __("Reset Password") }}
                            </button>
                        </div>
                    </form>
                    <div class="back">
                        <a href="{{ route('login') }}">{{ __("Sign In") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
