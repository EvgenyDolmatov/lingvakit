<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.answer-options") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Option: Value --}}
        @foreach($conformity->options as $key => $option)
            <div class="form-group row d-flex align-items-center mb-3">
                <div class="col-xl-10">
                    @if($key === 0)<label
                        class="form-control-label">{{ __("cms-pages.options") }}</label>@endif
                    <input type="text" name="question_option[]" class="form-control"
                           value="{{$option->value}}">
                </div>
                <div class="col-xl-2">
                    <div class="@if($key === 0) mt-5 @else mt-2 @endif">
                        <div class="styled-checkbox">
                            <input class="checkbox-is-correct" type="checkbox"
                                   name="{{'is_correct_'.($key+1)}}"
                                   id="{{'is_correct_'.($key+1)}}" value="1"
                                   @if($option->is_correct == 1) checked @endif>
                            <label for="{{'is_correct_'.($key+1)}}"></label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="text-left add-option-container">
            <button id="add_option_checkbox" type="button"
                    class="btn btn-shadow">{{ __("cms-pages.add-option") }}</button>
        </div>
    </div>
</div>
