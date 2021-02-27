<td class="td-actions text-right">
    <a href="{{ route('conformity.edit', [$course->id, $stage->id, $quiz->id, $question->id, $conformity->id]) }}"><i
            class="la la-edit edit"></i></a>
    <form style="display: inline-block" method="POST"
          action="{{ route('conformity.destroy', [$course->id, $stage->id, $quiz->id, $question->id, $conformity->id]) }}">
        @csrf @method('DELETE')

        <a href="{{ route('conformity.destroy', [$course->id, $stage->id, $quiz->id, $question->id, $conformity->id]) }}"
           onclick="event.preventDefault();if(confirm('{{ __("cms-messages.delete") }}')){this.closest('form').submit();}">
            <i class="la la-close delete"></i>
        </a>
    </form>
</td>
