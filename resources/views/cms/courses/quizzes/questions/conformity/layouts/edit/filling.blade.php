<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.answer-options") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Option: Word Number --}}
        <div class="form-group row d-flex align-items-center mb-3">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.word-number") }}</label>
                <input type="number" name="word_number" class="form-control" placeholder="1" value="{{$conformity->word_number}}">
                @error('word_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- Option: Value --}}
        @foreach($conformity->options as $key => $option)
            <div class="form-group row d-flex align-items-center mb-3">
                <div class="col-xl-10">
                    @if($key === 0)<label class="form-control-label">{{ __("cms-pages.options") }}</label>@endif
                    <input type="text" name="question_option[]" class="form-control" value="{{$option->value}}">
                </div>
                <div class="col-xl-2">
                    <div class="@if($key === 0) mt-5 @else mt-2 @endif">
                        <div class="styled-radio">
                            <input class="input-is-correct" type="radio" name="{{'is_correct_'.($key+1)}}" id="{{'is_correct_'.($key+1)}}" value="1"  @if($option->is_correct == 1) checked @endif>
                            <label for="{{'is_correct_'.($key+1)}}"></label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-left add-option-container">
            <button id="add_option" type="button" class="btn btn-shadow">{{ __("cms-pages.add-option") }}</button>
        </div>
    </div>
</div>
