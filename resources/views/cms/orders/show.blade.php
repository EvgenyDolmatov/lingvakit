@extends('layouts.cms')

@section('page-styles')
    <link rel="stylesheet" href="{{asset('assets/cms/css/bootstrap-select/bootstrap-select.min.css')}}">
@endsection
@section('title', __("cms-pages.order-info"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">{{ __("cms-pages.orders") }}</i></a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.order-number").$order->id }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.order-number") . $order->id }} </h4>
                    <a href="{{ route('orders.edit', $order->id) }}" type="button"
                       class="btn btn-primary">{{ __("cms-pages.change-data") }}</a>
                </div>
                <div class="widget-body">

                    <form action="{{ route('order-status.change', $order->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group row mb-3">
                            <div class="col-xl-2">
                                <label class="form-control-label">{{ __("cms-pages.order-status") }}</label>
                                <select id="status_id" name="status_id" class="custom-select form-control"
                                        onchange="event.preventDefault();this.closest('form').submit()">
                                    <option value="">{{ __("cms-pages.choose-order-status") }}</option>
                                    @foreach($statuses as $status)
                                        <option value="{{$status->id}}"
                                                @if($order->status->id == $status->id) selected @endif>
                                            {{__("cms-pages.".$status->title)}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>

                    @if($order->payment)
                        <div class="about-infos d-flex flex-column mb-3">
                            <div class="about-title"><h5>{{ __("cms-pages.payment-type") }}:</h5></div>
                            <div class="about-text">{{ __("cms-pages.".$order->payment_type) }}</div>
                        </div>
                    @endif
                    @if($order->company)
                        <div class="about-infos d-flex flex-column mb-3">
                            <div class="about-title"><h5>{{ __("cms-pages.company") }}:</h5></div>
                            <div class="about-text">{{ $order->company }}</div>
                        </div>
                    @endif
                    <div class="about-infos d-flex flex-column mb-3">
                        <div class="about-title"><h5>{{ __("cms-pages.full-name") }}:</h5></div>
                        <div class="about-text">{{ $order->getFullName() }}</div>
                    </div>
                    @if($order->email)
                        <div class="about-infos d-flex flex-column mb-3">
                            <div class="about-title"><h5>{{ __("cms-pages.email") }}:</h5></div>
                            <div class="about-text">{{ $order->email }}</div>
                        </div>
                    @endif

                    @if($order->phone)
                        <div class="about-infos d-flex flex-column mb-3">
                            <div class="about-title"><h5>{{ __("cms-pages.phone") }}:</h5></div>
                            <div class="about-text">{{ $order->phone }}</div>
                        </div>
                    @endif
                    <div class="about-infos d-flex flex-column mb-3">
                        <div class="about-title"><h5>{{ __("cms-pages.address") }}:</h5></div>
                        <div class="about-text">{{ $order->getShippingAddress() }}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-12">
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center justify-content-between">
                    <h4>{{ __("cms-pages.order-items") }}</h4>
                    @if(!in_array($order->status->title, ['completed', 'returned', 'canceled']))
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#add-product-modal">{{ __("cms-pages.add") }}</button>
                    @endif
                </div>
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="sorting-table" class="table mb-0">
                            <thead>
                            <tr>
                                <th>{{ __("cms-pages.sku") }}</th>
                                <th>{{ __("cms-pages.title") }}</th>
                                <th>{{ __("cms-pages.price") }}</th>
                                <th>{{ __("cms-pages.quantity") }}</th>
                                <th>{{ __("cms-pages.total") }}</th>
                                <th>{{ __("cms-pages.actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($details as $detail)
                                <tr>
                                    <td class="text-primary">{{ $detail->product->sku }}</td>
                                    <td>{{ $detail->product->title }}</td>
                                    <td>{{ $detail->product->getPrice($detail->product->price) }}</td>
                                    <td>{{ $detail->quantity }}</td>
                                    <td>{{ $detail->getTotal($detail->product->price) }}</td>

                                    <td class="td-actions">
                                        <a class="product-quantity" type="button" data-toggle="modal"
                                           data-target="#change-product-quantity" data-id="{{$detail->id}}"><i
                                                class="la la-edit edit"></i></a>
                                        <form style="display: inline-block" method="POST"
                                              action="{{ route('order-item.destroy', $detail->id) }}">
                                            @csrf @method('DELETE')

                                            <a href="{{ route('order-item.destroy', $detail->id) }}"
                                               onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
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

@section('modal')
    <div id="add-product-modal" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __("Add Product to Order") }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="POST" action="{{ route('order-item.add', $order->id) }}">
                        @csrf

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label">{{ __("cms-pages.product") }}</label>
                            <div class="col-lg-8">
                                <select name="product_id" class="custom-select form-control">
                                    <option value="" selected disabled>{{ __("cms-pages.choose-product") }}</option>
                                    @foreach($products as $product)
                                        <option value="{{$product->id}}">[{{$product->sku}}] {{ $product->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label">{{ __("cms-pages.quantity") }}</label>
                            <div class="col-lg-8">
                                <input type="number" name="quantity" class="form-control"
                                       placeholder="{{ __("cms-pages.quantity") }}" value="{{old('quantity')}}">
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">{{ __("cms-pages.add") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="change-product-quantity" class="modal fade">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __("Change Quantity of Product") }}</h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">close</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class="form-horizontal" method="POST">
                        @csrf @method('PUT')

                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label">{{ __("cms-pages.quantity") }}</label>
                            <div class="col-lg-8">
                                <input type="number" name="quantity" class="form-control"
                                       placeholder="{{ __("cms-pages.quantity") }}">
                                @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">{{ __("cms-pages.edit") }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
    <script src="{{asset('assets/cms/vendors/js/bootstrap-select/bootstrap-select.min.js')}}"></script>
@endsection

