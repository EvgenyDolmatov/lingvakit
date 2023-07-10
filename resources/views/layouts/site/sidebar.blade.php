<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll shrinked">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled ">
            <li><a href="#dropdown-courses" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-mortar-board"></i><span>{{ __("cms-pages.courses") }}</span></a>
                <ul id="dropdown-courses" class="collapse list-unstyled pt-0">
                    <li><a href="{{route('site.learning')}}">{{ __("site-pages.all-courses") }}</a></li>
                    <li><a href="{{route('site.my-courses')}}">{{ __("site-pages.my-courses") }}</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
