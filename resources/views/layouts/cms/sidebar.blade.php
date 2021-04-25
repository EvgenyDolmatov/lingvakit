<div class="default-sidebar">
    <!-- Begin Side Navbar -->
    <nav class="side-navbar box-scroll sidebar-scroll">
        <!-- Begin Main Navigation -->
        <ul class="list-unstyled ">

            {{-- Dashboard --}}
            <li class="dashboard"><a href="{{route('dashboard')}}"><i
                        class="la la-dashboard"></i><span>{{ __("cms-pages.dashboard") }}</span></a></li>

            {{-- Media Files --}}
            <li><a href="#dropdown-media" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-camera"></i><span>{{ __("cms-pages.media-files") }}</span></a>
                <ul id="dropdown-media" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('media.index') }}">{{ __("cms-pages.media-files") }}</a></li>
                </ul>
            </li>

            {{-- Courses --}}
            <li><a href="#dropdown-courses" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-mortar-board"></i><span>{{ __("cms-pages.courses") }}</span></a>
                <ul id="dropdown-courses" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('courses.index') }}">{{ __("cms-pages.courses") }}</a></li>
                    <li><a href="{{ route('promocodes.index') }}">{{ __("cms-pages.promo-codes") }}</a></li>
                </ul>
            </li>

            {{-- Categories --}}
            <li><a href="#dropdown-categories" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-list"></i><span>{{ __("cms-pages.categories") }}</span></a>
                <ul id="dropdown-categories" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('categories.index') }}">{{ __("cms-pages.categories") }}</a></li>
                </ul>
            </li>

            {{-- Students --}}
            <li><a href="#dropdown-students" aria-expanded="false" data-toggle="collapse"><i
                        class="la la-group"></i><span>{{ __("cms-pages.students") }}</span></a>
                <ul id="dropdown-students" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('students.index') }}">{{ __("cms-pages.students") }}</a></li>
                </ul>
            </li>

            {{-- Teachers --}}
            <li><a href="#dropdown-teachers" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-male"></i><span>{{ __("cms-pages.teachers") }}</span></a>
                <ul id="dropdown-teachers" class="collapse list-unstyled pt-0">
                    <li><a href="{{ route('teachers.index') }}">{{ __("cms-pages.teachers") }}</a></li>
                    <li><a href="{{route('courses.moderation')}}">{{ __("cms-pages.new-courses") }}</a></li>
                </ul>
            </li>

            {{-- Orders --}}
{{--            @can('order_management')
                <li><a href="#dropdown-orders" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-check-square"></i><span>{{ __("cms-pages.orders") }}</span></a>
                    <ul id="dropdown-orders" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('orders.index') }}">{{ __("cms-pages.all") }}</a></li>
                        <li><a href="{{ route('orders.create') }}">{{ __("cms-pages.add") }}</a></li>
                    </ul>
                </li>
            @endcan--}}

            {{-- Subscribers --}}
{{--            @can('subscriber_management')
                <li><a href="#dropdown-subscribers" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-envelope"></i><span>{{ __("cms-pages.subscribers") }}</span></a>
                    <ul id="dropdown-subscribers" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('subscribers.index') }}">{{ __("cms-pages.all") }}</a></li>
                        <li><a href="{{ route('subscribers.create') }}">{{ __("cms-pages.add") }}</a></li>
                    </ul>
                </li>
            @endcan--}}


        </ul>
    </nav>
</div>
