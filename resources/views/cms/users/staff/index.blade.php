@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.staff"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.staff") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <a href="{{ route('staff.create') }}" type="button" class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.add") }}</a>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.full-name") }}</th>
                                <th>{{ __("cms-pages.phone") }}</th>
                                <th>{{ __("cms-pages.email") }}</th>
                                <th><span style="width:100px;">{{ __("cms-pages.role") }}</span></th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><span class="text-primary">{{ $user->getFullName() }}</span></td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span style="width:100px;">
                                             @foreach($user->roles as $role)
                                            <span class="badge-text badge-text-small info">
                                                {{ __("cms-pages.".$role->name) }}
                                            </span>
                                            @endforeach
                                        </span>
                                    </td>
                                    <td class="td-actions">
                                        @if(Auth::user()->id != $user->id)
                                            <a href="{{ route('staff.edit', $user->id) }}"><i class="la la-edit edit"></i></a>
                                            <form style="display: inline-block" method="POST" action="{{ route('staff.destroy', $user->id) }}">
                                                @csrf @method('DELETE')

                                                <a href="{{ route('staff.destroy', $user->id) }}"
                                                   onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
                                                    <i class="la la-close delete"></i>
                                                </a>
                                            </form>
                                        @endif
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
