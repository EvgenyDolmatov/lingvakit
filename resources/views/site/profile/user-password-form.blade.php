<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("Update Password") }}</h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal" method="POST" action="{{ route('user-password.update')}}">
            @csrf @method('PUT')

            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Current Password") }}</label>
                <div class="col-lg-6">
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("New Password") }}</label>
                <div class="col-lg-6">
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <small>{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">{{ __("Confirm Password") }}</label>
                <div class="col-lg-6">
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
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
