@foreach($question->conformities as $key => $conformity)
    <div class="form-group row d-flex align-items-center mb-5">
        <div class="col-lg-12">
            <div class="widget-header no-actions d-flex align-items-center justify-content-between">
                <h4 class="{{$question->getFontSize()}}">{{$key+1}}.</h4>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="col-xl-12">
                        @if($conformity->audio)
                            <div class="about-infos d-flex mb-3">
                                <div class="about-text">
                                    <audio src="{{$conformity->getAudio()}}" preload="auto" controls></audio>
                                </div>
                            </div>
                        @endif
                        @if($conformity->image)
                            <div class="about-infos d-flex mb-5">
                                <div class="about-text">
                                    <img src="{{$conformity->getImage()}}" width="300" alt="{{ $conformity->title }}">
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                            <label for="conformity_{{$conformity->id}}">{{__("site-pages.write-answer")}}</label>
                            <input type="text" name="conformity_{{$conformity->id}}" id="conformity_{{$conformity->id}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
