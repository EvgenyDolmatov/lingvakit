<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.answer-options") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Option: Value --}}
        <div class="form-group row d-flex align-items-center mb-3">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.answer") }}</label>
                <input type="text" name="question_option" class="form-control" placeholder="{{ __("cms-pages.answer") }}">
                @error('question_option')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
</div>
