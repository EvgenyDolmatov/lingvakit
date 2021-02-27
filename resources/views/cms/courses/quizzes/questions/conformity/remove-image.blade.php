<form id="remove-image" action="{{route('conformity.image.remove',[$course->id, $stage->id, $quiz->id, $question->id, $conformity->id])}}"
      method="POST">
    @csrf @method('PUT')
</form>
<script type="text/javascript">
    window.onload = function(){document.getElementById('remove-image').submit();};
</script>
