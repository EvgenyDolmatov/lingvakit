<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center flex-wrap">
            <h2 class="page-header-title">@yield('title')</h2>
            <div>
                @yield('header-tools')
            </div>
        </div>

        @yield('course-languages')

        @if(Route::current()->getName() == 'site.index' && $languages)
            <div class="d-flex mt-4 mb-4">
                <a href="{{route('site.index')}}" class="btn btn-outline-primary btn-sm mr-3">
                    {{ __("cms-pages.all")}}
                </a>
                @foreach($languages as $language)
                    <form action="{{route('site.index')}}" method="get">
                        <input type="hidden" name="language" value="{{$language->id}}">
                        <button type="submit" class="btn btn-outline-primary btn-sm mr-3">
                            {{ __("languages.".$language->label)}}
                        </button>
                    </form>
                @endforeach
            </div>
        @endif

    </div>
</div>
