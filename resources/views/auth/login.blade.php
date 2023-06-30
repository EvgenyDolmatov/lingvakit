@extends('layouts.new-app-page')

@section('page-group-title', 'Аккаунт')
@section('page-group-slogan', 'Управление учётной записью')
@section('page-image', asset('assets/promo-site/images/auth.jpg'))

@section('page-content')
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Вход в аккаунт</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links">
                            <a href="{{url('/')}}">Главная</a><i> / </i> Вход
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end section-->
    <div class="clearfix"></div>

    <section class="sec-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-centered">
                    <div class="text-box padding-4 border">
                        <div class="smart-forms smart-container wrap-3">
                            <h4 class="uppercase">Вход в аккаунт</h4>
                            <form method="post" action="{{ route('login') }}" id="contact">
                                @csrf
                                <div>
                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="text" name="email" id="email" class="gui-input"
                                                   placeholder="Электронная почта" value="{{old('email')}}">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                        @error('email')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="section">
                                        <label class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input"
                                                   placeholder="{{ __("Password") }}">
                                            <span class="field-icon"><i class="fa fa-lock"></i></span>
                                        </label>
                                    </div><!-- end section -->

                                    <div class="section flex">
                                        <label class="switch block">
                                            <input type="checkbox" name="remember" id="remember" checked>
                                            <span class="switch-label" for="remember" data-on="Да"
                                                  data-off="Нет"></span>
                                            <span>{{ __("Remember me") }}</span>
                                        </label>
                                        <a href="{{ route('password.request') }}">
                                            {{ __("Forgot Password ?") }}
                                        </a>
                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="button btn-primary">Войти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('assets/promo-site/js/smart-forms/smart-forms.css')}}">
@endsection
