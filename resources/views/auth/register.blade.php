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
                        <h3>Создание аккаунта</h3>
                    </div>
                    <div class="col-md-6 text-right">
                        <div class="pagenation_links">
                            <a href="{{url('/')}}">Главная</a><i> / </i> Регистрация
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
                    <div class="text-box padding-3 border">
                        <div class="smart-forms smart-container wrap-3">

                            <h3>Регистрация</h3>

                            <form method="post" action="{{ route('register') }}" id="account">
                                @csrf
                                <div class="form-body">
                                    <label for="names" class="field-label">Имя и фамилия</label>
                                    <div class="frm-row">
                                        <div class="section colm colm6">
                                            <label class="field prepend-icon">
                                                <input type="text" name="name" id="name" class="gui-input"
                                                       value="{{ old('name') }}" placeholder="{{__("Name")}}">
                                                <span class="field-icon"><i class="fa fa-user"></i></span>
                                            </label>
                                            @error('name')
                                            <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="section colm colm6">
                                            <label class="field prepend-icon">
                                                <input type="text" name="surname" id="surname" class="gui-input"
                                                       placeholder="{{__("Surname")}}" value="{{ old('surname') }}">
                                                <span class="field-icon"><i class="fa fa-user"></i></span>
                                            </label>
                                            @error('surname')
                                            <small>{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label for="email" class="field-label">Электронная почта</label>
                                        <label class="field prepend-icon">
                                            <input type="email" name="email" id="email" class="gui-input"
                                                   placeholder="username@mail.ru..." value="{{ old('email') }}">
                                            <span class="field-icon"><i class="fa fa-envelope"></i></span>
                                        </label>
                                        @error('email')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="section">
                                        <label for="password" class="field-label">{{__("Password")}}</label>
                                        <label class="field prepend-icon">
                                            <input type="password" name="password" id="password" class="gui-input">
                                            <span class="field-icon"><i class="fa fa-lock"></i></span>
                                        </label>
                                        @error('password')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="section">
                                        <label for="password_confirmation" class="field-label">
                                            {{__("Confirm Password")}}
                                        </label>
                                        <label class="field prepend-icon">
                                            <input type="password" name="password_confirmation"
                                                   id="password_confirmation" class="gui-input">
                                            <span class="field-icon"><i class="fa fa-lock"></i></span>
                                        </label>
                                        @error('password_confirmation')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="section">
                                        <label for="user_type" class="field-label">Я регистрируюсь как</label>
                                        <label class="option" for="user_student">
                                            <input type="radio" name="user_type" id="user_student" value="student" checked>
                                            <span class="radio"></span> Студент
                                        </label>
                                        <label class="option" for="user_teacher">
                                            <input type="radio" name="user_type" id="user_teacher" value="teacher">
                                            <span class="radio"></span> Преподаватель
                                        </label>
                                    </div>


                                    <div class="section">
                                        <label class="option" for="agree">
                                            <input type="checkbox" name="agreement" id="agree">
                                            <span class="checkbox"></span>
                                            Принимаю <a href="#" class="smart-link"> правила и условия сайта </a>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label for="user_text" class="field-label">Введите текст с картинки</label>
                                        <img src="{{$captchaImage->image_path}}" alt style="margin-bottom: 10px;width: 300px">
                                        <label class="field">
                                            <input type="hidden" name="user_text_x" value="{{$captchaImage->id}}">
                                            <input type="text" name="user_text" id="user_text" class="gui-input">
                                        </label>
                                        @error('user_text')
                                        <small>{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-footer">
                                        <button type="submit" class="button btn-primary">Создать аккаунт</button>
                                    </div>
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
