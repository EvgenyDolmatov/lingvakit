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
                @foreach($languages as $language)
                    <button type="button" class="btn btn-warning btn-sm mr-3">
                        {{$language->name}}
                    </button>
                @endforeach
            </div>
        @endif

    </div>
</div>
