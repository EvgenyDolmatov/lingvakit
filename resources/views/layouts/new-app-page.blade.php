@extends('layouts.new-app')

@section('content')
    <section>
        <div class="header-inner two">
            <div class="inner text-center">
                <h4 class="title text-white uppercase">@yield('page-group-title')</h4>
                <h5 class="text-white uppercase">@yield('page-group-slogan')</h5>
            </div>
            <div class="overlay bg-opacity-5"></div>
            <img src="@yield('page-image')" alt="" class="img-responsive"/></div>
    </section>
    <div class="clearfix"></div>

    @yield('page-content')
@endsection