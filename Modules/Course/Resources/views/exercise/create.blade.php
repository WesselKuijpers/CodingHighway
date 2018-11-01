{{-- Page to create an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="container contact-form">
          {{-- Including the form title --}}
          @include('shared.form_title', ['title' => "Creeër een nieuwe opdracht in de cursus $course->name"])
          @include('shared.error')
          <form method="post" action="{{ route('exercise.store', ['course_id' => $course->id]) }}"
                enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{$course->id}}" name="course_id">
            <input type="hidden" name="is_first" value="0" id="is_first">
            @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
            @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10])

              <div class="form-group">
              <label for="is_final" class="text-md-right font-weight-bold">Eindopdracht</label>
              <div class="form-group">
                <select name="is_final" id="is_final" class="form-control">
                  <option value="0">Nee</option>
                  <option value="1">Ja</option>
                </select>
              </div>
            </div>

            @include('shared.form', ['label' => 'Opdrachtafbeeldingen', 'name' => 'media[]', 'type' => 'file', 'multiple' => true])

            @include('course::shared.levels', ['levels' => $levels])
            @if($course->exercises->count() != 0)
              @include('course::shared.select_exercise', ['exercises' => $exercises, 'id' => 0])
              <div class="form-group">
                <label for="is_first" class="text-md-right font-weight-bold">Eerste opdracht?</label>

                <div class="form-group">
                  <input type="checkbox" name="is_first" value="1" id="is_first" onchange="ToggleNextExercise(this)">
                </div>
              </div>
            @else
              <input type="hidden" name="is_first" value="1">
              <input type="hidden" name="next_id" value="0">
            @endif


            @include('shared.submit_button')
          </form>
      </div>
  </div>
</div>
<script>
    function ToggleNextExercise() {
        // Get the checkbox
        var checkBox = document.getElementById("is_first");
        // Get the output text
        var text = document.getElementById("next-exercise");

        // If the checkbox is checked, display the output text
        if (checkBox.checked != true){
            text.style.display = "";
        } else {
            text.style.display = "none";
        }
    }
</script>
@endsection