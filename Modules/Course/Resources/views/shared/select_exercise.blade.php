<div class="form-group" id="next-id">
    <label for="next-exercise" class="text-md-right font-weight-bold">Volgende opdracht</label>
    <select name="next_id" class="form-control">
        <option value="0">Geen</option>
        
        @if(App\Models\course\Exercise::count() != 0 && $course->firstExercise->id != $id)
            @foreach($exercises as $exercise)
                @if($exercise->id != $id && $exercise->id != $course->firstExercise->id)
                    <option value="{{$exercise->id}}" 
                        {{ (!empty($next_id) && $exercise->id == $next_id) ? "SELECTED" : null}}
                        class="text-truncate pt-2">{{$exercise->title}}</option>
                @endif
            @endforeach 
        @endif
    </select>
</div>
