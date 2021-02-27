@foreach($question->conformities as $key => $conformity)
    <div class="form-group row d-flex align-items-center mb-5">
        <div class="col-lg-12">
            <div
                class="widget-header no-actions d-flex align-items-center justify-content-between">
                <h4 class="{{$question->getFontSize()}}">{{$key+1}}. {!! $conformity->title !!}</h4>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12">
                    <input type="text" name="conformity_{{$conformity->id}}" class="form-control">
                </div>
            </div>
        </div>
    </div>
@endforeach
