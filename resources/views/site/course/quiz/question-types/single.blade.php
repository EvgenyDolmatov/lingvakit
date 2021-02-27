@foreach($question->conformities as $key => $conformity)
    <div class="form-group row d-flex align-items-center mb-5">
        <div class="col-lg-12">
            <div class="widget-header no-actions d-flex align-items-center justify-content-between">
                <h4 class="{{$question->getFontSize()}}">{{$key+1}}. {{$conformity->title}}</h4>
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
                    @foreach($conformity->options as $option)
                        <div class="col-xl-3">
                            <div class="mb-3">
                                <div class="styled-radio">
                                    <input type="radio"
                                           name="conformity_{{$conformity->id}}"
                                           id="option_{{$option->id}}"
                                           value="{{$option->id}}">
                                    <label class="{{$question->getFontSize()}}"
                                           for="option_{{$option->id}}">{{$option->value}}</label>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endforeach
