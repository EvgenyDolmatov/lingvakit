<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.question-form") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Question: Title --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.question") }}</label>
            <div class="col-lg-9">
                <div>{{$question->title}}</div>
            </div>
        </div>
        {{-- Question: Image --}}
        @if($question->image)
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">{{ __("cms-pages.image") }}</label>
                <div class="col-lg-9">
                    <div class="form-group">
                        <img src="{{ $question->getImage() }}" width="100" alt="{{ $course->title }}">
                    </div>
                </div>
            </div>
        @endif
        {{-- Question: Audio --}}
        @if(count($question->audios) > 0)
            @foreach($question->audios as $audio)
                <div class="form-group row d-flex align-items-center mb-5">
                    <label class="col-lg-3 form-control-label">{{ __("cms-pages.audio") }}</label>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <audio src="{{$audio->getAudio()}}" preload="auto" controls></audio>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
