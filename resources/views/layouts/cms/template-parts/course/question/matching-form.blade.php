<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.sentence") }}</h4>
    </div>
    <div class="widget-body">
        @if($questionType === 'make_text')
            {{-- Conformity: Titles (Sentences) --}}
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">{{ __("cms-pages.sentence") }}</label>
                <div id="sentences" class="col-lg-9">
                    <div class="form-group">
                        <input type="text" name="matching_title[]" class="form-control"
                               placeholder="{{ __("cms-pages.sentence") }}" value="{{old('matching_title[]')}}">
                        @error('matching_title[]')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <div class="col-lg-9 offset-lg-3">
                    <span id="add_sentence" class="btn btn-shadow">{{__("cms-pages.add-sentence")}}</span>
                </div>
            </div>
        @else
            {{-- Conformity --}}
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label">{{ __("cms-pages.sentence") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="matching_title" class="form-control"
                           placeholder="{{ __("cms-pages.sentence") }}" value="{{old('matching_title')}}">
                    @error('matching_title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        @endif
        {{-- Conformity Image --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.main-image") }}</label>
            <div class="col-lg-9">
                <div class="form-group preview">
                    <div class="current-item">
                        <img src="{{asset('assets/cms/img/no-image.jpg')}}" width="240" alt>
                    </div>
                </div>
                <button type="button" class="btn btn-primary square mr-1 mb-2 btn-attach" data-type="image"
                        data-var="matching_image" data-toggle="modal" data-target="#modal-files">
                    {{__("cms-pages.choose")}}
                </button>
            </div>
        </div>
        {{-- Conformity Audio --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.audio") }}</label>
            <div class="col-lg-9">
                <div class="form-group preview"></div>
                <button type="button" class="btn btn-primary square mr-1 mb-2 btn-attach" data-type="audio"
                        data-var="matching_audio" data-toggle="modal" data-target="#modal-files">
                    {{__("cms-pages.choose")}}
                </button>
            </div>
        </div>
        {{-- Conformity: Totoal Points --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <label class="col-lg-3 form-control-label">{{ __("cms-pages.points") }}</label>
            <div class="col-lg-9">
                <input type="number" name="points" class="form-control" value="1">
            </div>
        </div>
    </div>
</div>
