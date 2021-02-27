<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.sentence") }}</h4>
    </div>
    <div class="widget-body">
        @if($question->type === 'make_text')
            {{-- Matching: Titles (Sentences) --}}
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">{{ __("cms-pages.sentence") }}</label>
                <div id="sentences" class="col-lg-9">
                    @foreach($conformity->options as $option)
                        <div class="form-group">
                            <input type="text" name="matching_title[]" class="form-control" value="{{$option->value}}">
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <div class="col-lg-9 offset-lg-3">
                    <span id="add_sentence" class="btn btn-shadow">{{__("cms-pages.add-sentence")}}</span>
                </div>
            </div>
        @else
            {{-- Matching: Title --}}
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">{{ __("cms-pages.sentence") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="matching_title" class="form-control"
                           placeholder="{{ __("cms-pages.sentence") }}" value="{{$conformity->title}}">
                </div>
            </div>
        @endif
        {{-- Matching: Image --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.main-image") }}</label>
            <div class="col-lg-9">
                <div class="form-group preview">
                    <div class="current-item">
                        @if($conformity->image)
                            <img src="{{ $conformity->getImage() }}" width="240" alt="{{ $conformity->title }}">
                            <div class="small file-remove" data-method="PUT"
                                 data-delete="{{route('conformity.image.remove', [$course->id, $stage->id, $quiz->id, $question->id, $conformity->id])}}">
                                {{ __("cms-pages.remove") }}
                            </div>
                            <input type="hidden" name="matching_image" value="{{ $conformity->image }}">
                        @else
                            <img src="{{asset('assets/cms/img/no-image.jpg')}}" width="240" alt>
                        @endif
                    </div>
                </div>
                <button type="button" class="btn btn-primary square mr-1 mb-2 btn-attach"
                        data-type="image" data-var="matching_image" data-toggle="modal"
                        data-target="#modal-files">
                    {{__("cms-pages.choose")}}
                </button>
            </div>
        </div>
        {{-- Matching: Audio --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.audio") }}</label>
            <div class="col-lg-9">
                <div class="form-group preview">
                    @if($conformity->audio)
                        <div class="current-item">
                            <audio src="{{$conformity->getAudio()}}" controls></audio>
                            <div class="small file-remove" data-method="PUT"
                                 data-delete="{{route('conformity.audio.remove', [$course->id, $stage->id, $quiz->id, $question->id, $conformity->id])}}">
                                {{ __("cms-pages.remove") }}
                            </div>
                            <input type="hidden" name="matching_audio" value="{{ $conformity->audio }}">
                        </div>
                    @endif
                </div>
                <button type="button" class="btn btn-primary square mr-1 mb-2 btn-attach"
                        data-type="audio" data-var="matching_audio" data-toggle="modal"
                        data-target="#modal-files">
                    {{__("cms-pages.choose")}}
                </button>
            </div>
        </div>
        {{-- Conformity: Totoal Points --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.points") }}</label>
            <div class="col-lg-9">
                <input type="number" name="points" class="form-control" value="{{ $conformity->points }}">
            </div>
        </div>
    </div>
</div>
