@extends('layouts.chat')

@section('title', "Чат")
@section('header-tools')
    <div class="page-header-tools">
        <a class="btn btn-gradient-01" href="#">{{ __("cms-pages.add-widget") }}</a>
    </div>
@endsection
@section('content')
    @include('layouts.chat.compact-sidebar')

    <div class="content-inner compact">
        <!-- Begin Container -->
        <div class="container-fluid p-0">
            <div class="row m-0">
                <div class="col-xl-12 p-0">
                    <!-- Begin Widget -->
                    <div class="row m-0 widget no-bg">
                        <!-- Begin Friends Sidebar -->
                        <div class="col-xl-2 col-lg-3 col-md-12 p-0" id="sidebar">
                            @include('layouts.chat.sidebar')
                        </div>
                        <!-- End Friends Sidebar -->
                        <!-- Begin Messages -->
                        <div class="col-xl-8 col-lg-9 col-md-12 d-flex no-padding">
                            <!-- Begin Card -->
                            <div class="card w-100 no-bg">
                                <!-- Begin Tab -->
                                <div class="tab-content">
                                    <div class="tab-pane fade show active messages-scroll auto-scroll" style="flex: 1 1"
                                         id="msg-1">
                                        <div class="card-header">
                                            <div class="d-flex flex-xl-row flex-lg-row flex-md-row flex-column align-items-center">
                                                <div class="col-12 d-flex justify-content-xl-start justify-content-lg-start justify-content-md-start justify-content-center">
                                                    <div class="discussion-name">
                                                        {{$contact->getFullName()}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body d-flex flex-column no-padding">
                                            @if( isset($currentChat) )
                                                <div id="msg-container" class="container-fluid">
                                                    @foreach($currentChat->messages as $msg)
                                                        @if($msg->user_id == $currentUser->id)
                                                            <div class="row m-0">
                                                                <div class="message-card">
                                                                    <div class="card-body sender-background">
                                                                        <span>{{$msg->content}}</span>
                                                                    </div>
                                                                    <span class="sender-time"><small>{{$msg->getTime()}}</small></span>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="row m-0 justify-content-end">
                                                                <div class="message-card">
                                                                    <div class="card-body receiver-background">
                                                                        <span>{{$msg->content}}</span>
                                                                    </div>
                                                                    <span class="receiver-time"><small>14:02</small></span>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="card-body d-flex justify-content-center align-items-center h-100">
                                                    <p>Напишите Ваше сообщение.</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <form action="@if(isset($currentChat)){{route('chat.send-message', $currentChat)}}@else{{route('chat.store', $contact)}}@endif"
                                      method="POST" id="send-msg-form">
                                    @csrf
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button class="btn" type="button">
                                                <i class="la la-paperclip la-2x text-primary"></i>
                                            </button>
                                        </span>
                                        <input type="text" class="form-control no-ppading-right no-padding-left"
                                               placeholder="Введите Ваше сообщение ..." name="chat_message">
                                        <span class="input-group-btn">
                                        <button class="btn @if(isset($currentChat)){{"send-msg"}}@endif">
                                            <i class="la la-paper-plane la-2x text-primary"></i>
                                        </button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-2 p-0 chat-infos bg-white has-shadow">
                            <div class="message-avatar">
                                <div class="overlay"></div>
                                <img src="assets/img/avatar/avatar-02-big.jpg" class="img-fluid" alt="...">
                            </div>
                            <div class="message-infos text-center">
                                <div class="user-title">{{$contact->getFullName()}}</div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <ul class="list-unstyled mt-5">
                                    @if($contact->phone)
                                        <li class="pb-3 text-center">
                                            <i class="la la-map-marker la-2x d-block text-primary mb-2"></i>{{$contact->phone}}
                                        </li>
                                    @endif
                                    @if($contact->email)
                                        <li class="pb-3 text-center">
                                            <i class="la la-at la-2x d-block text-primary mb-2"></i>{{$contact->email}}
                                        </li>
                                    @endif
                                    @if(isset($currentChat))
                                        <li class="pb-3 text-center">
                                            <form action="{{route('chat.destroy', $currentChat)}}" method="POST">
                                                @csrf @method('delete')
                                                <button class="btn btn-primary mr-1 mb-2 btn-attach"
                                                        onclick="event.preventDefault();if(confirm('Чат будет удален у всех пользователей! Продолжить?')){this.closest('form').submit();}">
                                                    Удалить чат
                                                </button>
                                            </form>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.cms.footer')
    </div>
@endsection
@section('page-scripts')
    <script src="{{asset('assets/cms/vendors/js/chart/chart.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/moment.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/calendar/fullcalendar.min.js')}}"></script>
    <script src="{{asset('assets/cms/vendors/js/owl-carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/cms/js/dashboard/db-default.js')}}"></script>
@endsection
