<div class="form-group row d-flex align-items-center mb-5">
    <div class="col-lg-12">
        <div class="source-list source">
            @foreach($question->conformities as $conformity)
                @foreach($conformity->options as $option)
                    <div class="list-item m-3 {{$question->getFontSize()}}" draggable="true"
                         data-option="{{$option->id}}">
                        {{ $option->value }}
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
    <div class="col-lg-12">
        <div class="source-list">
            @foreach($question->conformities as $conformity)
                <div class="question-container" data-id="{{$conformity->id}}">
                    @if($question->conformityHasImage())
                        <div class="question-body" style="height:100px;">
                            <img src="{{ $conformity->getImage() }}" height="100"
                                 alt="{{ $quiz->title }}">
                        </div>
                    @endif
                    <div class="question-body m-3 {{$question->getFontSize()}}">
                        {{ $conformity->title }}
                    </div>
                    <div class="draggable-field m-3"
                         data-option="{{$conformity->id}}"></div>
                    <input type="hidden" name="conformity_{{$conformity->id}}" value="">
                </div>
            @endforeach
        </div>
    </div>
</div>
