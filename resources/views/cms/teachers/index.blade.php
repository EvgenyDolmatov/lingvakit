@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.teachers"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.teachers") }}</li>
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
                                <th>{{ __("cms-pages.name") }}</th>
                                <th>{{ __("cms-pages.email") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td><a href="{{route('teachers.show', $teacher->id)}}"
                                           class="text-primary">{{ $teacher->getFullName() }}</a></td>
                                    <td>{{ $teacher->email }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('teachers.show', $teacher->id) }}"><i
                                                    class="la la-eye edit"></i></a>

                                        <form style="display: inline-block" method="POST"
                                              action="{{ route('users.ban-switcher', $teacher->id) }}">
                                            @csrf @method('PUT')

                                            @if($teacher->is_active)
                                                <a href="{{ route('users.ban-switcher', $teacher->id) }}"
                                                   onclick="event.preventDefault();if(confirm('{{ __("cms-messages.block-user") }}')){this.closest('form').submit();}">
                                                    <i class="la la-ban edit"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('users.ban-switcher', $teacher->id) }}"
                                                   onclick="event.preventDefault();if(confirm('{{ __("cms-messages.unblock-user") }}')){this.closest('form').submit();}">
                                                    <i class="la la-ban edit banned"></i>
                                                </a>
                                            @endif
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