<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.password-update") }}</h4>
    </div>
    <div class="widget-body">
        <form class="form-horizontal" method="POST" action="{{ route('user-password.update')}}">
            @csrf @method('PUT')

            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.current-password") }}</label>
                <div class="col-lg-9">
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.new-password") }}</label>
                <div class="col-lg-9">
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-3 form-control-label d-flex justify-content-lg-end">{{ __("cms-pages.confirm-password") }}</label>
                <div class="col-lg-9">
                    <input type="password" name="password_confirmation" class="form-control">
                    @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div class="em-separator separator-dashed"></div>
            @include('layouts.cms.template-parts.form-buttons')
        </form>
    </div>
</div>
