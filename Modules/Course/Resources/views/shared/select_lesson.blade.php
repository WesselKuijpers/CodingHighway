<div class="form-group" id="next-id">
  <label for="next-lesson" class="text-md-right font-weight-bold">Volgende les</label>

  <select name="next_id" class="form-control">
    <option value="0">Geen</option>

    @if(count($lessons) != 0 && $course->firstLesson->id != $id)
      @foreach($lessons as $lesson)
        @if($lesson->id != $id && $lesson->id != $lesson->course->firstLesson->id)
          <option value="{{$lesson->id}}"
                  {{ (!empty($next_id) && $lesson->id == $next_id) ? "SELECTED" : null}}
                  class="text-truncate pt-2">{{$lesson->title}}</option>
        @endif
      @endforeach
    @endif
  </select>
</div>
