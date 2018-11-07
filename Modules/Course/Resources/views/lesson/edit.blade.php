{{-- Page to edit a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  
  {{-- Including the form title partial --}}
  @include('shared.form_title', ['title' => "Pas een les aan in de cursus $course->name"])
  @include('shared.error')
  <form method="post" action="{{ route('lesson.update', ['course_id'=>$course->id, 'id'=>$lesson->id]) }}"
        enctype="multipart/form-data">
    {{ method_field('PUT') }}
    {{ csrf_field() }}
    <input type="hidden" value="{{$lesson->id}}" name="id">
    <input type="hidden" value="{{$course->id}}" name="course_id">
    <input type="hidden" name="is_first" value="0" id="is_first">

    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'value' => $lesson->title
    , 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'value' => $lesson->content, 'required' => true
    , 'class' => 'form-control'])
    @include('shared.form', ['label' => 'Media', 'name' => 'media[]', 'type' => 'file',
        'class' => ''])

    @include('course::shared.levels', ['levels' => $levels])
    @include('course::shared.select_lesson', ['lessons' => $lessons, 'id' => $lesson->id, 'course' => $course, 'next_id' => $lesson->next_id])
    
    @if($course->firstLesson->id != $lesson->id)
      <div class="form-group row">
        <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste les?</label>
        <input type="checkbox" name="is_first" value="1" id="is-first" onchange="ToggleNextExercise(this)" data-toggle="toggle" data-on="Ja" data-off="Nee">
      </div>
    @endif

    @include('shared.submit_button')
  </form>
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
