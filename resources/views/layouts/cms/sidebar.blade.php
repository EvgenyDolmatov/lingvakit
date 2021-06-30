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
            @if($currentUser->hasPermissionTo('course manage'))
                <li><a href="#dropdown-courses" aria-expanded="false" data-toggle="collapse"><i
                                class="la la-mortar-board"></i><span>{{ __("cms-pages.courses") }}</span></a>
                    <ul id="dropdown-courses" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('courses.index') }}">{{ __("cms-pages.all-courses") }}</a></li>

                        @if($currentUser->hasRole(['superuser', 'admin']))
                            <li><a href="{{route('courses.moderation')}}">{{ __("cms-pages.new-courses") }}</a></li>
                        @endif

                        @if($currentUser->hasPermissionTo('promocode manage'))
                            <li><a href="{{ route('promocodes.index') }}">{{ __("cms-pages.promo-codes") }}</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Roles and Permissions --}}
            @if($currentUser->hasPermissionTo('role manage'))
                <li><a href="#dropdown-roles" aria-expanded="false" data-toggle="collapse"><i
                                class="la la-list"></i><span>{{ __("cms-pages.roles-permissions") }}</span></a>
                    <ul id="dropdown-roles" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('roles.index') }}">{{ __("cms-pages.roles") }}</a></li>
                        <li><a href="{{ route('permissions.index') }}">{{ __("cms-pages.permissions") }}</a></li>
                    </ul>
                </li>
            @endif

            {{-- Categories --}}
            @if($currentUser->hasPermissionTo('category manage'))
                <li><a href="#dropdown-categories" aria-expanded="false" data-toggle="collapse"><i
                                class="la la-list"></i><span>{{ __("cms-pages.categories") }}</span></a>
                    <ul id="dropdown-categories" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('categories.index') }}">{{ __("cms-pages.categories") }}</a></li>
                    </ul>
                </li>
            @endif

            {{-- Languages --}}
            @if($currentUser->hasPermissionTo('category manage'))
                <li><a href="#dropdown-languages" aria-expanded="false" data-toggle="collapse"><i
                                class="la la-language"></i><span>{{ __("cms-pages.languages") }}</span></a>
                    <ul id="dropdown-languages" class="collapse list-unstyled pt-0">
                        <li><a href="{{ route('languages.index') }}">{{ __("cms-pages.languages") }}</a></li>
                    </ul>
                </li>
            @endif

            {{-- My Students --}}
            <li><a href="#dropdown-students" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-group"></i><span>{{ __("cms-pages.students") }}</span></a>
                <ul id="dropdown-students" class="collapse list-unstyled pt-0">
                    @if($currentUser->hasPermissionTo('student manage'))
                        <li><a href="{{ route('students.index') }}">{{ __("cms-pages.students") }}</a></li>
                    @endif

                    <li><a href="{{ route('groups.index') }}">{{ __("cms-pages.groups") }}</a></li>
                </ul>
            </li>
        </ul>

        <span class="heading">Управление</span>

        <ul class="list-unstyled">

            {{-- All Users --}}
            <li><a href="#dropdown-users" aria-expanded="false" data-toggle="collapse"><i
                            class="la la-group"></i><span>{{ __("cms-pages.users") }}</span></a>
                <ul id="dropdown-users" class="collapse list-unstyled pt-0">
                    @if($currentUser->hasPermissionTo('user manage'))
                        <li><a href="{{ route('admin.users.index') }}">{{ __("cms-pages.all-users") }}</a></li>
                    @endif

                    @if($currentUser->hasPermissionTo('teacher manage'))
                        <li><a href="{{ route('teachers.index') }}">{{ __("cms-pages.teachers") }}</a></li>
                    @endif

                    @if($currentUser->hasPermissionTo('student manage'))
                        <li><a href="{{ route('students.index') }}">{{ __("cms-pages.students") }}</a></li>
                    @endif
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
