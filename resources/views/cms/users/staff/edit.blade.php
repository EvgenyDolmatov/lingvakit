@extends('layouts.cms')

@section('title', __("cms-pages.edit-employee"))
@section('header-tools')
    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="ti ti-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ route('staff.index') }}">{{ __("cms-pages.staff") }}</a></li>
        <li class="breadcrumb-item active">{{ __("cms-pages.edit") }}</li>
    </ul>
@endsection
@section('content')
    <div class="row flex-row">
        <div class="col-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>{{ __("cms-pages.employee-form") }}</h4>
                </div>
                <div class="widget-body">
                    <form class="form-horizontal" method="POST" action="{{ route('staff.update', $user->id) }}">
                        @csrf @method('PUT')

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.personal-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.full-name") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <input type="text" name="surname" class="form-control"
                                               placeholder="{{ __("cms-pages.surname-placeholder") }} *" value="{{ $user->surname }}">
                                        @error('surname')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="name" class="form-control"
                                               placeholder="{{ __("cms-pages.name-placeholder") }} *" value="{{ $user->name }}">
                                        @error('name')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" name="patronymic" class="form-control"
                                               placeholder="{{ __("cms-pages.patronymic-placeholder") }}" value="{{ $user->patronymic }}">
                                        @error('patronymic')
                                        <div class="invalid-feedback">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.email") }}<span
                                    class="text-danger ml-2">*</span></label>
                            <div class="col-lg-9">
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{ __("cms-pages.email-placeholder") }}" value="{{ $user->email }}">
                                @error('email')
                                <div class="invalid-feedback">{{ __($message) }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.phone") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="phone" id="phone" class="form-control"
                                       placeholder="{{ __("cms-pages.phone-placeholder") }}" value="{{ $user->phone }}">
                                @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.passport") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="passport" id="passport" class="form-control"
                                       placeholder="{{ __("cms-pages.passport-placeholder") }}" value="{{ $user->passport }}">
                                @error('passport')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-5 align-items-center">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.role") }}</label>
                            <div class="col-lg-9 select mb-3">
                                <select name="role_id" class="custom-select form-control">
                                    <option value="" disabled>{{ __("cms-pages.choose-role") }}</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" @if($userRole == $role->id) selected @endif>
                                            {{ __("cms-pages.".$role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.address-info") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.country") }}</label>
                            <div class="col-lg-9">
                                <select name="country_id" class="custom-select form-control">
                                    <option value="" @if(!$user->country) selected @endif disabled>{{ __("cms-pages.choose-country") }}</option>
                                    @foreach($countries as $country)
                                        <option value="{{$country->id}}" @if($user->country && $country->id == $user->country->id) selected @endif>
                                            {{ __("countries.".$country->code) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.state") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="state" class="form-control"
                                       placeholder="{{ __("cms-pages.state") }}" value="{{$user->state}}">
                                @error('state')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.city") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="city" class="form-control"
                                       placeholder="{{ __("cms-pages.city") }}" value="{{$user->city}}">
                                @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.address") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="address" class="form-control"
                                       placeholder="{{ __("cms-pages.address") }}" value="{{$user->address}}">
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.zip") }}</label>
                            <div class="col-lg-9">
                                <input type="text" name="zip" class="form-control"
                                       placeholder="{{ __("cms-pages.zip") }}" value="{{$user->zip}}">
                                @error('zip')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="section-title mt-3 mb-5">
                            <h4>{{ __("cms-pages.permissions") }}</h4>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-3 form-control-label">{{ __("cms-pages.permissions") }}</label>
                            <div class="col-lg-9">
                                @foreach($permissions as $permission)
                                    <div class="mb-3">
                                        <div class="styled-checkbox">
                                            <input type="checkbox" name="{{$permission->name}}"
                                                   id="permission_{{$permission->id}}" @if(in_array($permission->id, $userPermissions))
                                                   checked @endif value="1">
                                            <label for="permission_{{$permission->id}}">{{ __("cms-pages.".$permission->name) }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @include('layouts.cms.template-parts.form-buttons')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('modal-content')
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Modal Title</h4>
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">×</span>
                <span class="sr-only">close</span>
            </button>
        </div>
        <div class="modal-body">
            <p>
                Donec non lectus nec est porta eleifend. Morbi ut dictum augue, feugiat condimentum est. Pellentesque tincidunt justo nec aliquet tincidunt. Integer dapibus tellus non neque pulvinar mollis. Maecenas dictum laoreet diam, non convallis lorem sagittis nec. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc venenatis lacus arcu, nec ultricies dui vehicula vitae.
            </p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save</button>
        </div>
    </div>
@endsection
@section('page-scripts')
    @include('layouts.cms.template-parts.scripts-forms')
@endsection
