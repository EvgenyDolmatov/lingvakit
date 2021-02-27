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
                    <th><span>{{ __("cms-pages.answer") }}</span></th>
                    <th><span>{{ __("cms-pages.extra-option") }}</span></th>
                    <th><span>{{ __("cms-pages.points") }}</span></th>
                    <th>{{ __("cms-pages.actions") }}</th>
                </tr>
                </thead>
                <tbody>
                @if($question->conformities)
                    @foreach($question->conformities as $conformity)
                        <tr>
                            <td style="width: 150px;">
                                <img src="{{ $conformity->getImage() }}" width="100" alt>
                            </td>
                            <td>{{ $conformity->title }}</td>
                            <td>{{ $conformity->getCorrectMatchingOption() }}</td>
                            <td>{{ $conformity->getIncorrectMatchingOption() }}</td>
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
