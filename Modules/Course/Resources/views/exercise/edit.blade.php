{{-- Page to edit an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
<div class="row">
  <div class="col-12">
    <div class="container contact-form">
      @include('shared.form_title', ['title' => "Pas een opdracht aan in de cursus $course->name"])
      @include('shared.error')
      <form method="post" action="{{ route('exercise.update', ['course_id'=>$course->id, 'id'=>$exercise->id]) }}"
            enctype="multipart/form-data">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <input type="hidden" value="{{$exercise->id}}" name="id">
        <input type="hidden" value="{{$course->id}}" name="course_id">
        <input type="hidden" name="is_first" value="0" id="is_first">

        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'value' => $exercise->title
        , 'class' => 'form-control'])
        @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10, 'value' => $exercise->content])
          <label for="is_final" class="text-md-right font-weight-bold">Eindopdracht</label>
          <div class="form-group">
            <select name="is_final" class="form-control">
              <option value="0">Nee</option>
              <option value="1">Ja</option>
            </select>
          </div>
        @include('shared.form', ['label' => 'Opdrachtafbeeldingen', 'name' => 'media[]', 'type' => 'file', 'value' => $exercise->file, 'multiple' => true])

        @include('course::shared.levels', ['levels' => $levels])
        @include('course::shared.select_exercise', ['exercises' => $exercises, 'id' => $exercise->id, 'course' => $course, 'next_id' => $exercise->next_id])
        @if($course->firstExercise->id != $exercise->id)
          <div class="form-group">
            <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste opdracht?</label>

            <div class="form-group">
              <input type="checkbox" name="is_first" value="1" id="is_first">
            </div>
          </div>
        @else
          <input type="hidden" name="is_first" value="1" id="is_first">
        @endif

        @include('shared.submit_button')
      </form>
    </div>
  </div>
</div>

@endsection