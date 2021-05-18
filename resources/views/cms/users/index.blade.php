@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.users"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.users") }}</li>
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
                                <th>{{ __("cms-pages.status") }}</th>
                                <th>{{ __("cms-pages.email") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td><a href="{{route('students.show', $user->id)}}"
                                           class="text-primary">{{ $user->getFullName() }}</a></td>
                                    <td>
                                        @if(!$user->hasRole('teacher'))
                                            {{ __("cms-pages.student") }}
                                        @else
                                            {{ __("cms-pages.teacher") }}
                                        @endif
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="td-actions">
                                        @if(!$user->hasRole('teacher'))
                                            <a href="{{ route('students.show', $user->id) }}">
                                                <i class="la la-eye edit"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('teachers.show', $user->id) }}">
                                                <i class="la la-eye edit"></i>
                                            </a>
                                        @endif

                                        @if(!$user->hasVerifiedEmail() && !$user->courses()->exists())
                                            <form style="display: inline-block" method="POST"
                                                  action="{{ route('admin.users.destroy', $user->id) }}">
                                                @csrf @method('DELETE')

                                                <a href="{{ route('admin.users.destroy', $user->id) }}"
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
