{{-- Page to create an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

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
    <div class="row">
      <label for="is_final" class="col-md-4 col-form-label text-md-right font-weight-bold">Eindopdracht</label>
      <div class="col-md-6 form-group">
        <select name="is_final" id="is_final" class="form-control">
          <option value="1">Ja</option>
          <option value="0">Nee</option>
        </select>
      </div>
    </div>

    @include('shared.form', ['label' => 'Opdrachtafbeeldingen', 'name' => 'media[]', 'type' => 'file', 'multiple' => true])

    @include('course::shared.levels', ['levels' => $levels])
    @include('course::shared.select_exercise', ['exercises' => $exercises, 'id' => 0])


    <div class="form-group row">
      <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste opdracht?</label>

      <div class="col-md-6">
        <input type="checkbox" name="is_first" value="1" id="is_first" onchange="ToggleNextExercise(this)">
      </div>
    </div>

    @include('shared.submit_button')
  </form>
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