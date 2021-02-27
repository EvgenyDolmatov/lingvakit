@foreach($question->conformities as $key => $conformity)
    <div class="form-group row d-flex align-items-center mb-5">
        <div class="col-lg-12">
            <div
                class="widget-header no-actions d-flex align-items-center justify-content-between">
                <h4 class="{{$question->getFontSize()}}">{{$key+1}}. {!! $conformity->getSentenceForQuiz() !!}</h4>
            </div>
        </div>
    </div>
@endforeach
