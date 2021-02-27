<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.answer-options") }}</h4>
    </div>
    <div class="widget-body">

        <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.choice-type") }}</label>
            </div>
            <div class="col-xl-5">
                <div class="mt-4">
                    <div class="styled-radio">
                        <input class="logic_switcher" type="radio" name="logic_switcher" id="logic_tf"
                               value="0" @if(count($conformity->options) == 2) checked @endif>
                        <label for="logic_tf">{{__("cms-pages.logic-true")}}
                            /{{__("cms-pages.logic-false")}}</label>
                    </div>
                </div>
            </div>
            <div class="col-xl-7">
                <div class="mt-4">
                    <div class="styled-radio">
                        <input class="logic_switcher" type="radio" name="logic_switcher" id="logic_tfa"
                               value="1" @if(count($conformity->options) == 3) checked @endif>
                        <label for="logic_tfa">{{__("cms-pages.logic-true")}}
                            /{{__("cms-pages.logic-false")}}/{{__("cms-pages.logic-no_answer")}}</label>
                    </div>
                </div>
            </div>
        </div>

        <label class="form-control-label">{{ __("cms-pages.options") }}</label>
        <div class="form-group row d-flex align-items-center mb-3">
            @foreach($conformity->options as $key => $option)
                <div class="col-xl-4">
                    <div class="mt-4">
                        <div @if($key == 2) id="place_for_input" @endif class="styled-radio">
                            <input type="hidden" name="question_option[]" class="form-control"
                                   value="{{$option->value}}">
                            <input class="input-is-correct" type="radio"
                                   name="{{'is_correct_'.($key+1)}}" id="{{'is_correct_'.($key+1)}}"
                                   value="1" @if($option->is_correct === 1) checked @endif>
                            <label
                                for="{{'is_correct_'.($key+1)}}">{{__("cms-pages.logic-".$option->value)}}</label>
                        </div>
                    </div>
                </div>
            @endforeach
            @if(count($conformity->options) < 3)
                {{-- No Answer Input --}}
                <div class="col-xl-4">
                    <div class="mt-4">
                        <div id="place_for_input" class="styled-radio">
                            <div class="logic-no-answer">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
