<div id="accordion" class="accordion">
    <div class="widget has-shadow">
        {{-- Widget Header --}}
        @include('cms.courses.quizzes.questions.conformity.layouts.widget-header')

        <div class="widget-body">
            <div class="table-responsive">
                <table id="sorting-table" class="table mb-0">
                    <thead>
                    <tr>
                        <th>{{ __("cms-pages.answer") }}</th>
                        <th>{{ __("cms-pages.correct-answer") }}</th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($question->conformities)
                        @foreach($question->conformities as $keyConformity => $conformity)
                            @foreach($conformity->options as $key => $option)
                                @if($key===0)
                                    <tr class="text-primary header">
                                        <td style="width: 70%"><h4>{{ ($keyConformity+1).'. '.$conformity->title }}</h4>
                                        </td>
                                        @include('cms.courses.quizzes.questions.conformity.layouts.action-buttons')
                                    </tr>
                                @endif
                                <tr class="border-bottom">
                                    <td class="text-primary" style="width: 50%">{{ $option->value }}</td>
                                    <td>
                                        <form
                                            action="{{ route('options.change-is-correct', [$question->quiz->topic->stage->course->id, $question->quiz->topic->stage->id, $question->quiz->id, $question->id, $option->id]) }}"
                                            method="POST"> @csrf @method('PUT')
                                            <div class="styled-radio">
                                                <input type="radio" name="option_{{$option->id}}"
                                                       id="option_{{$option->id}}"
                                                       value="1"
                                                       @if($option->is_correct == 1) checked @endif
                                                       onchange="event.preventDefault();this.closest('form').submit()">
                                                <label
                                                    for="option_{{$option->id}}">{{ __("cms-pages.is_true") }}</label>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
