<div class="row">
    <div class="page-header">
        <div class="d-flex align-items-center">
            <h2 class="page-header-title">@yield('title')</h2>
            <div>
                @yield('header-tools')
            </div>
        </div>

        @yield('course-languages')

        @if(Route::current()->getName() == 'site.index' && $languages)
            <div class="d-flex mt-4 mb-4">
                <button type="button" class="btn btn-outline-primary btn-sm mr-3">
                    {{ __("cms-pages.all")}}
                </button>
                @foreach($languages as $language)
                    <button type="button" class="btn btn-outline-primary btn-sm mr-3">
                        {{ __("languages.".$language->label)}}
                    </button>
                @endforeach
            </div>
        @endif

    </div>
</div>
