@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.teachers"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.reviews") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>

                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.course") }}</th>
                                <th>{{ __("cms-pages.grade") }}</th>
                                <th>{{ __("cms-pages.review") }}</th>
                                <th>{{ __("cms-pages.author") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{$review->course->title}}</td>
                                    <td>{{$review->grade}}</td>
                                    <td>{{$review->review}}</td>
                                    <td>{{$review->user->getFullName()}}</td>
                                    <td class="td-actions">

                                        <form style="display: inline-block" method="POST" class="ban-review"
                                              action="{{ route('reviews.ban', $review->id) }}">
                                            @csrf @method('PUT')

                                            @if($review->is_active)
                                                <a href="{{ route('reviews.ban', $review->id) }}"
                                                   onclick="event.preventDefault();this.closest('form.ban-review').submit();">
                                                    <i class="la la-ban edit"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('reviews.ban', $review->id) }}"
                                                   onclick="event.preventDefault();this.closest('form.ban-review').submit();">
                                                    <i class="la la-ban edit banned"></i>
                                                </a>
                                            @endif
                                        </form>

                                        <form style="display: inline-block" method="POST"
                                              action="{{ route('reviews.destroy', $review->id) }}">
                                            @csrf @method('DELETE')

                                            <a href="{{ route('reviews.destroy', $review->id) }}"
                                               onclick="event.preventDefault();if(confirm('Запись будет удалена. Продолжить?')){this.closest('form').submit();}">
                                                <i class="la la-close delete"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-index')
@endsection