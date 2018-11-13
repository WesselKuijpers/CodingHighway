{{-- Page to create a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
<div class="row">
  <div class="col-12">
    <div class="container contact-form">
      {{-- Including the form title partial --}}
      @include('shared.form_title', ['title' => "Creeër een nieuwe les in de cursus $course->name"])
      @include('shared.error')
      <form method="post" action="{{ route('lesson.store', ['course_id'=>$course->id]) }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{$course['id']}}" name="course_id">
        <input type="hidden" name="is_first" value="0" id="is_first">

        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control', 'value' => old('title')])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true, 'value' => old('content')])

          <label for="media" class="text-md-right font-weight-bold">Media</label>
          <div class="form-group">
            <input type="file" id="media" name="media[]" class="form-control-file" multiple>
          </div>

        @include('course::shared.levels', ['levels' => $levels])
        @if($course->lessons->count() != 0)
          @include('course::shared.select_lesson', ['lessons' => $lessons, 'id' => 0])
          <div class="form-group">
            <label for="is_first" class="text-md-right font-weight-bold">Eerste opdracht?</label>

            <div class="form-group">
              <input type="checkbox" name="is_first" value="1" id="is-first" data-toggle="toggle" data-on="Ja" data-off="Nee" onchange="ToggleNextExercise(this)">
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
      var checkBox = document.getElementById("is-first");
      // Get the output text
      var text = document.getElementById("next-id");

      // If the checkbox is checked, display the output text
      if (checkBox.checked == false){
          text.style.display = "";
      } else if(checkBox.checked == true) {
          text.style.display = "none";
      }
  }
</script>
@endsection