@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.customers"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.customers") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <a href="{{ route('customers.create') }}" type="button" class="btn btn-primary mr-1 mb-2">{{ __("cms-pages.add") }}</a>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.full-name") }}</th>
                                <th>{{ __("cms-pages.company") }}</th>
                                <th>{{ __("cms-pages.phone") }}</th>
                                <th>{{ __("cms-pages.email") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td><span class="text-primary">{{ $customer->getFullName() }}</span></td>
                                    <td>{{ $customer->getCompany() }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td class="td-actions">
                                        <a href="{{ route('customers.edit', $customer->id) }}"><i class="la la-edit edit"></i></a>
                                        <form style="display: inline-block" method="POST" action="{{ route('customers.destroy', $customer->id) }}">
                                            @csrf @method('DELETE')

                                            <a href="{{ route('customers.destroy', $customer->id) }}" onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
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
