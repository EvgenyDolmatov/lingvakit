<div class="widget has-shadow">
    {{-- Widget Header --}}
    @include('cms.courses.quizzes.questions.conformity.layouts.widget-header')

    <div class="widget-body">
        <div class="table-responsive">
            <table id="sorting-table" class="table mb-0">
                <thead>
                <tr>
                    <th>{{ __("cms-pages.image") }}</th>
                    <th>{{ __("cms-pages.question") }}</th>
                    <th>{{ __("cms-pages.options") }}</th>
                    <th>{{ __("cms-pages.points") }}</th>
                    <th class="text-right">{{ __("cms-pages.actions") }}</th>
                </tr>
                </thead>
                <tbody>

                @if($question->conformities)
                    @foreach($question->conformities as $conformity)
                        <tr>
                            <td style="width: 150px;">
                                <img src="{{ $conformity->getImage() }}" width="100" alt>
                            </td>
                            <td>{!! $conformity->title !!}</td>
                            <td>
                                @foreach($conformity->options as $key => $option)
                                    <form class="d-inline"
                                          action="{{ route('options.change-is-correct', [$question->quiz->topic->stage->course->id, $question->quiz->topic->stage->id, $question->quiz->id, $question->id, $option->id]) }}"
                                          method="POST"> @csrf @method('PUT')

                                        <a class="@if($option->is_correct == 1) text-success @endif" href="{{ route('options.change-is-correct', [$question->quiz->topic->stage->course->id, $question->quiz->topic->stage->id, $question->quiz->id, $question->id, $option->id]) }}"
                                           onclick="event.preventDefault();this.closest('form').submit();">
                                            {{ __("cms-pages.logic-".$option->value) }}
                                        </a>
                                    </form>
                                    @if(($key+1)<count($conformity->options))/@endif
                                @endforeach
                            </td>
                            <td>{{ $conformity->points }}</td>

                            @include('cms.courses.quizzes.questions.conformity.layouts.action-buttons')
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
