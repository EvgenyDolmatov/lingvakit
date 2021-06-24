@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.groups"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.groups") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <a href="{{ route('groups.create') }}" type="button"
                       class="btn btn-success mr-1 mb-2">{{ __("cms-pages.add") }}</a>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.group-code") }}</th>
                                <th>{{ __("cms-pages.group-name") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($groups as $group)
                                <tr>
                                    <td><a href="{{route('groups.show', $group->id)}}"
                                           class="text-primary">{{ $group->code }}</a></td>
                                    <td>{{ $group->name }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('groups.show', $group->id) }}">
                                            <i class="la la-eye edit"></i>
                                        </a>
                                        <a href="{{ route('groups.edit', $group->id) }}"><i
                                                    class="la la-edit edit"></i></a>
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
