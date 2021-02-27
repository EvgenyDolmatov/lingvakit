@extends('layouts.auth')

@section('content')
    <div class="container-fluid h-100 overflow-y">
        <div class="row flex-row h-100">
            <div class="col-12 my-auto">
                <div class="password-form mx-auto">
                    @include('layouts.cms.template-parts.logo-form')

                    <h3>{{ __("Password Recovery") }}</h3>
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <div class="group material-input">
                            <input type="email" name="email" value="{{ old('email', $request->email) }}" required hidden>
                        </div>
                        <div class="group material-input">
                            <input type="password" name="password" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>{{ __("New Password") }}</label>
                        </div>
                        <div class="group material-input">
                            <input type="password" name="password_confirmation" required>
                            <span class="highlight"></span>
                            <span class="bar"></span>
                            <label>{{ __("Confirm Password") }}</label>
                        </div>
                        <div class="button text-center">
                            <button type="submit" class="btn btn-lg btn-gradient-01">
                                {{ __("Reset Password") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
