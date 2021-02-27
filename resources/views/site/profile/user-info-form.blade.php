<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("Update Profile") }}</h4>
    </div>
    <div class="widget-body">

        <form class="form-horizontal" method="POST" action="{{ route('user-info.update')}}">
            @csrf @method('PUT')

            <div class="col-10 ml-auto">
                <div class="section-title mt-3 mb-3">
                    <h4>01. {{ __("Personal Information") }}</h4>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Full Name") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="name" class="form-control" placeholder="{{ __("David Green") }}" value="{{ Auth::user()->name }}">
                    @error('name')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Email") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="email" class="form-control" placeholder="{{ __("dgreen@mail.com") }}" value="{{ Auth::user()->email }}">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Phone") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="phone" class="form-control" placeholder="+7 (999) 999-99-99" value="{{ Auth::user()->phone }}">
                    @error('phone')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="col-10 ml-auto">
                <div class="section-title mt-3 mb-3">
                    <h4>02. {{ __("Address Information") }}</h4>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Address") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="address" class="form-control" placeholder="{{ __("123 Century Blvd") }}" value="{{ Auth::user()->address }}">
                    @error('address')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("City") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="city" class="form-control" placeholder="{{ __("Los Angeles") }}" value="{{ Auth::user()->city }}">
                    @error('city')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("State") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="state" class="form-control" placeholder="{{ __("California") }}" value="{{ Auth::user()->state }}">
                    @error('state')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Country") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="country" class="form-control" placeholder="{{ __("United States") }}" value="{{ Auth::user()->country }}">
                    @error('country')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Zip") }}</label>
                <div class="col-lg-6">
                    <input type="text" name="zip" class="form-control" placeholder="90001" value="{{ Auth::user()->zip }}">
                    @error('zip')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="em-separator separator-dashed"></div>
            <div class="text-right">
                <button class="btn btn-gradient-01" type="submit">{{ __("Save Changes") }}</button>
                <button class="btn btn-shadow" type="reset">{{ __("Cancel") }}</button>
            </div>
        </form>
    </div>
</div>
