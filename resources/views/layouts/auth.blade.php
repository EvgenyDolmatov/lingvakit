@extends('layouts.app')

@section('template-main-style')
    <link rel="stylesheet" href="{{asset('assets/cms/vendors/css/base/elisyam-1.5.min.css')}}">
@endsection
@section("body-class", "bg-white")
@section('page-content')
    @yield('content')
@endsection
