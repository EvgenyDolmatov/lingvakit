@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.courses"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.courses") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <div class="form-group">
                        @if($currentUser->hasRole(['superuser', 'admin']))
                            <div class="btn-group" role="group" aria-label="Button Group">
                                <a href="{{ route('courses.index') }}" type="button"
                                   class="btn @if(Request::route()->getName() == 'courses.index') btn-primary @else btn-secondary @endif mr-1 mb-2">
                                    {{ __("cms-pages.my-courses") }}
                                </a>
                                <a href="{{ route('courses.all') }}" type="button"
                                   class="btn @if(Request::route()->getName() == 'courses.all') btn-primary @else btn-secondary @endif mr-1 mb-2">
                                    {{ __("cms-pages.all-courses") }}
                                </a>
                            </div>
                        @endif
                        <a href="{{ route('courses.create') }}" type="button"
                           class="btn btn-success mr-1 mb-2">{{ __("cms-pages.add") }}</a>
                    </div>
                </div>
                <div class="widget-body">
                    @if(auth()->user()->courses->count())
                        <div class="table-responsive">
                            <table id="sorting-table" class="table mb-0">
                                <thead>
                                <tr>
                                    <th>{{ __("cms-pages.image") }}</th>
                                    <th>{{ __("cms-pages.course") }}</th>
                                    <th>{{ __("cms-pages.duration") }}</th>
                                    <th>{{ __("cms-pages.publish-date") }}</th>
                                    <th>{{ __("cms-pages.actions") }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $course)
                                    <tr>
                                        <td style="width: 100px;">
                                            <div class="table-img">
                                                <img src="{{ $course->getImage() }}" width="100" alt>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('courses.show', $course->id) }}"
                                               class="@if($course->is_allowed) text-primary @else text-danger @endif">
                                                {{ $course->title }}
                                            </a>
                                        </td>
                                        <td>{{ $course->getDuration() }}</td>
                                        <td>{{ $course->publish_date }}</td>
                                        <td class="td-actions">
                                            <a href="{{ route('courses.show', $course->id) }}"><i
                                                        class="la la-eye edit"></i></a>

                                            @if($currentUser->hasRole(['superuser','admin']))
                                                <form style="display: inline-block" method="POST"
                                                      action="{{ route('courses.moderate-switcher', $course->id) }}">
                                                    @csrf @method('PUT')

                                                    @if($course->is_allowed)
                                                        <a href="{{ route('courses.moderate-switcher', $course->id) }}"
                                                           onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="la la-ban edit"></i>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('courses.moderate-switcher', $course->id) }}"
                                                           onclick="event.preventDefault();this.closest('form').submit();">
                                                            <i class="la la-ban edit banned"></i>
                                                        </a>
                                                    @endif
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>У вас пока что нет ни одного курса.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-index')
@endsection
