<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.profile-update") }}</h4>
    </div>
    <div class="widget-body">

        <form class="form-horizontal" method="POST" action="{{ route('user-info.update')}}">
            @csrf @method('PUT')

            <div class="col-9 ml-auto">
                <div class="section-title mt-3 mb-3">
                    <h4>01. {{ __("cms-pages.personal-info") }}</h4>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.full-name") }}</label>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-4">
                            <input type="text" name="surname" class="form-control"
                                   placeholder="{{ __("cms-pages.surname") }}" value="{{ $user->surname }}">
                            @error('surname')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="name" class="form-control"
                                   placeholder="{{ __("cms-pages.name") }}" value="{{ $user->name }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-lg-4">
                            <input type="text" name="patronymic" class="form-control"
                                   placeholder="{{ __("cms-pages.patronymic") }}" value="{{ $user->patronymic }}">
                            @error('patronymic')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.email") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="email" class="form-control" placeholder="{{ __("cms-pages.email") }}" value="{{ $user->email }}">
                    @error('email')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.phone") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="+7 (999) 999-99-99" value="{{ $user->phone }}">
                    @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-9 ml-auto">
                <div class="section-title mt-3 mb-3">
                    <h4>02. {{ __("cms-pages.address-info") }}</h4>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.country") }}</label>
                <div class="col-lg-9">
                    <select name="country_id" class="custom-select form-control">
                        <option value="" selected disabled>{{ __("cms-pages.country") }}</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}" @if($country->id === $user->country_id) selected @endif>
                                {{ __("countries.".$country->code) }}
                            </option>
                        @endforeach
                    </select>
                    @error('country_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.state") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="state" class="form-control" placeholder="{{ __("cms-pages.state") }}" value="{{ $user->state }}">
                    @error('state')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.city") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="city" class="form-control" placeholder="{{ __("cms-pages.city") }}" value="{{ $user->city }}">
                    @error('city')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.address") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="address" class="form-control" placeholder="{{ __("cms-pages.address") }}" value="{{ $user->address }}">
                    @error('address')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.zip") }}</label>
                <div class="col-lg-9">
                    <input type="text" name="zip" class="form-control" placeholder="123456" value="{{ $user->zip }}">
                    @error('zip')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="em-separator separator-dashed"></div>
            @include('layouts.cms.template-parts.form-buttons')
        </form>
    </div>
</div>
