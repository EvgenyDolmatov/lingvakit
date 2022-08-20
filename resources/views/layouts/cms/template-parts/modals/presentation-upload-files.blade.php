<div id="presentation-files" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{__("cms-pages.upload-files")}}</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <div class="modal-body">

                <input id="search" class="form-control mb-3" type="search" name="search" placeholder="{{__("cms-pages.search")}}">

                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link choose-aria active" id="pres-choosing-tab" data-toggle="tab" href="#pres-choosing-area" role="tab" aria-controls="pres-choosing-area" aria-selected="true">
                            <i class="ion-image mr-2"></i>{{__("cms-pages.media-files")}}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pres-uploading-tab" data-toggle="tab" href="#pres-uploading-area" role="tab" aria-controls="pres-uploading-area" aria-selected="false">
                            <i class="ion-archive mr-2"></i>{{__("cms-pages.uploading")}}
                        </a>
                    </li>
                </ul>

                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active" id="pres-choosing-area" role="tabpanel" aria-labelledby="pres-choosing-tab">
                        {{-- File Gallery --}}
                        <div {{--id="media-library"--}} class="media-library row"></div>
                    </div>
                    <div class="tab-pane fade" id="pres-uploading-area" role="tabpanel" aria-labelledby="pres-uploading-tab">
                        <form id="pres-form-upload" action="{{route('media.store-ajax')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-12 mb-3">
                                    <label class="form-control-label">{{ __("cms-pages.files") }}</label>
                                    <input type="file" name="filename[]" class="form-control" multiple
                                           placeholder="{{ __("cms-pages.filename") }}" value="{{old('filename')}}">
                                </div>
                            </div>
                            <div class="alert alert-success hide"></div>

                            <div class="text-right mt-3">
                                <button id="upload-files" class="btn btn-gradient-01" type="submit">{{ __("cms-pages.save") }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
