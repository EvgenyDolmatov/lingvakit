@if($quiz->getResult($user))
    <div class="row flex-row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="widget widget-16 has-shadow">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-xl-8 d-flex flex-column justify-content-center align-items-center">
                            <div class="total-views">Ваш балл:</div>
                            {{--<div class="counter">{{$quiz->getQtyCorrectAnswers($user)}}
                                /{{$quiz->getTotalQuestions()}}</div>--}}
                            <div class="counter">{{$quiz->getUserScore($user)}}
                                / {{$quiz->getTotalPoints()}}</div>
                            <div id="quiz-result"
                                 data-percent="{{$quiz->getTotalScore($user)}}"
                                 data-passing-score="{{$quiz->passing_score}}"></div>
                        </div>
                        <div class="col-xl-4 d-flex justify-content-center align-items-center">
                            <div class="pages-views">
                                <div class="percent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            <div class="widget widget-17 has-shadow">
                <div class="widget-body">
                    <div class="row">
                        <div class="col-xl-7 d-flex flex-column justify-content-center align-items-center">
                            <div class="total-visitors">Времени потрачено:</div>
                            <div class="counter">{{$quiz->showSpentTime($user)}}</div>
                            <div id="quiz-time"
                                 data-total-time="{{$quiz->getTotalTime()}}"
                                 data-spent-time="{{$quiz->getSpentTime($user)}}"></div>
                        </div>
                        <div class="col-xl-5 d-flex justify-content-center align-items-center">
                            <div class="visitors">
                                <div class="percent"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="widget widget-12 has-shadow">
    <div class="widget-body">
        <h2>{{ __("site-pages.about-lesson") }}</h2>
        <div class="about-infos d-flex flex-column mt-3">
            <div class="about-text">
                {!! $quiz->description !!}
            </div>
        </div>
        @if($quiz->audio)
            <div class="about-infos d-flex flex-column mb-3">
                <div class="about-text">
                    <audio src="{{$quiz->getAudio()}}" preload="auto" controls></audio>
                </div>
            </div>
        @endif
        @if($quiz->video)
            <div class="about-infos d-flex flex-column mb-3">
                <div class="about-text">
                    <div id="player" data-id="{{$quiz->getVideoId()}}"
                         data-width="100%" data-height="390"></div>
                </div>
            </div>
        @endif
    </div>
</div>

<div class="row flex-row">
    {{-- Quiz Category Info --}}
    <div class="col-xl-4">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-start ml-4 mr-4">
                        <i class="ti-view-list-alt text-primary"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="number">{{__($quiz->category->name)}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Total Questions Info --}}
    <div class="col-xl-4">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-start ml-4 mr-4">
                        <i class="ti-check-box text-primary"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="number">{{$quiz->showTotalQuestions()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Quiz Duration Info --}}
    <div class="col-xl-4">
        <div class="widget widget-12 has-shadow">
            <div class="widget-body">
                <div class="media">
                    <div class="align-self-start ml-4 mr-4">
                        <i class="ti-time text-primary"></i>
                    </div>
                    <div class="media-body align-self-center">
                        <div class="number">{{$quiz->getDuration()}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
