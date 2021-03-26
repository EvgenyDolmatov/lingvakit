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
            @foreach($files as $file)
                <div class="about-infos d-flex flex-column mb-3">
                    <div class="about-text">
                        <a href="{{route('media.download', $file->id)}}">{{$file->document->title}}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
