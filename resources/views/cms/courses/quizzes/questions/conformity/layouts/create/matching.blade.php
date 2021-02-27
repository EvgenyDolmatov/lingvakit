<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.matching") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Option: Value --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.matching") }}</label>
                <input type="text" name="question_option" class="form-control"
                       placeholder="{{ __("cms-pages.matching") }}" value="{{old('question_option')}}">
                @error('question_option')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- Option: Extra Option --}}
        <div class="form-group row d-flex align-items-center mb-5">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.extra-option") }}</label>
                <input type="text" name="question_extra_option" class="form-control"
                       placeholder="{{ __("cms-pages.placeholder.extra-option") }}"
                       value="{{old('question_extra_option')}}">
            </div>
        </div>
    </div>
</div>
