@extends('layouts.cms')

@section('page-styles')
    @include('layouts.cms.template-parts.styles-index')
@endsection
@section('title', __("cms-pages.orders"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.orders") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.filter") }}</h4>
                    <div class="text-right">
                        <div class="actions dark">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary mr-1 mb-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">
                                    {{ __("cms-pages.add") }} ...
                                </button>
                                <div class="dropdown-menu">
                                    <a href="{{ route('orders.create') }}" class="dropdown-item">
                                        <i class="la la-plus"></i>{{ __("cms-pages.to-new-customer") }}
                                    </a>
                                    <a href="{{ route('orders.create-for-exists') }}" class="dropdown-item">
                                        <i class="la la-plus"></i>{{ __("cms-pages.to-exists-customer") }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.order") }}</th>
                                <th>{{ __("cms-pages.customer") }}</th>
                                <th>{{ __("cms-pages.order-date") }}</th>
                                <th>{{ __("cms-pages.order-price") }}</th>
                                <th><span style="width:150px;">{{ __("cms-pages.order-status") }}</span></th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="text-primary">{{ $order->id }}</td>
                                    <td>{{ $order->getCustomer() }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>{{ $order->getTotalPrice() }}</td>
                                    <td>
                                        <span style="width:150px;">
                                            <span class="badge-text badge-text-small {{$order->getStatusLabel($order->status->title)}}">
                                                {{ __("cms-pages.".$order->status->title) }}
                                            </span>
                                        </span>
                                    </td>
                                    <td class="td-actions">
                                        <a href="{{ route('orders.show', $order->id) }}"><i class="la la-eye edit"></i></a>
                                        <a href="{{ route('orders.edit', $order->id) }}"><i class="la la-edit edit"></i></a>
                                        <form style="display: inline-block" method="POST" action="{{ route('orders.destroy', $order->id) }}">
                                            @csrf @method('DELETE')

                                            <a href="{{ route('orders.destroy', $order->id) }}" onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
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

