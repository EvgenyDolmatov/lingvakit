<form id="remove-audio" action="{{route('conformity.audio.remove',[$course->id, $stage->id, $quiz->id, $question->id, $conformity->id])}}"
      method="POST">
    @csrf @method('PUT')
</form>
<script type="text/javascript">
    window.onload = function(){document.getElementById('remove-audio').submit();};
</script>
