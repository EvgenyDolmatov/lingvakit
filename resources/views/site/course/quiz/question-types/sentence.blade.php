@foreach($question->conformities as $key => $conformity)
    <div class="form-group row d-flex align-items-center mb-5">
        <div class="col-lg-12">
            <div
                class="widget-header no-actions d-flex align-items-center justify-content-between">
                <h4 class="{{$question->getFontSize()}}">{{$key+1}}.</h4>
            </div>

            <div class="source-list source">
                @foreach($conformity->options as $option)
                    <div class="list-item item-word m-3 {{$question->getFontSize()}}" draggable="true"
                         data-option="{{$option->id}}">
                        {{ $option->value }}
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-12">
            <div class="source-list">
                @foreach($conformity->options as $option)
                    <div class="question-container make-sentence" data-id="{{$option->id }}">
                        <div class="draggable-field field-word m-3"
                             data-option="{{$option->id}}"></div>
                        <input type="hidden" name="option_{{$option->id}}" value="">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endforeach
