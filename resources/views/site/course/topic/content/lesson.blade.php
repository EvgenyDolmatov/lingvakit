<div class="widget widget-12 has-shadow">
    <div class="widget-body">
        @if($lesson->image)
            <div class="about-infos d-flex flex-column mb-3">
                <div class="about-text">
                    <img src="{{$lesson->getImage()}}" style="max-width:400px;" alt="{{$lesson->getImageAlt()}}">
                </div>
            </div>
        @endif

        <div class="about-infos d-flex flex-column mt-3">
            <div class="about-text">
                {!! $lesson->description !!}
            </div>
        </div>
        @if($lesson->video)
            <div class="about-infos d-flex flex-column mb-3">
                <div class="about-text">
                    <div id="player" data-id="{{$lesson->getVideoId()}}"
                         data-width="640" data-height="390"></div>
                </div>
            </div>
        @endif
        @if($files)
            <div class="about-title mt-3 mb-3">
                <h3>{{__("site-pages.additional-materials")}}</h3>
            </div>
            <div class="about-infos d-flex justify-content-start">
                @foreach($files as $file)
                    @if($file->document && $file->document->type === 'file')
                        <div class="about-text m-3">
                            <div class="about-icon {{$file->getFileType($file->document->filename)}} mb-2"></div>
                            <a href="{{route('media.download', $file->file_id)}}">{{$file->document->title}}</a>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
