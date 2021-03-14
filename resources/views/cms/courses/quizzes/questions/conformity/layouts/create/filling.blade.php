<div class="widget has-shadow">
    <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4>{{ __("cms-pages.answer-options") }}</h4>
    </div>
    <div class="widget-body">
        {{-- Option: Word Number --}}
        <div class="form-group row d-flex align-items-center mb-3">
            <div class="col-xl-12">
                <label class="form-control-label">{{ __("cms-pages.word-number") }}</label>
                <input type="number" name="word_number" class="form-control" placeholder="1">
                @error('word_number')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- Option: Value --}}
        <div class="form-group row d-flex align-items-center mb-3">
            <div class="col-xl-10">
                <label class="form-control-label">{{ __("cms-pages.options") }}</label>
                <input type="text" name="question_option[]" class="form-control">
                @error('question_option[]')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-xl-2">
                <div class="mt-4">
                    <div class="styled-radio">
                        <input class="input-is-correct" type="radio" name="is_correct_1" id="is_correct_1" value="1">
                        <label for="is_correct_1"></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row d-flex align-items-center mb-3">
            <div class="col-xl-10">
                <input type="text" name="question_option[]" class="form-control">
            </div>
            <div class="col-xl-2">
                <div class="mt-2">
                    <div class="styled-radio">
                        <input class="input-is-correct" type="radio" name="is_correct_2" id="is_correct_2" value="1">
                        <label for="is_correct_2"></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-left add-option-container">
            <button id="add_option" type="button" class="btn btn-shadow">{{ __("cms-pages.add-option") }}</button>
        </div>
    </div>
</div>
