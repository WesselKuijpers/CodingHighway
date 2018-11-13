{{-- Page to edit a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="container contact-form">
        @include('shared.form_title', ['title' => "Pas een les aan in de cursus $course->name"])
        @include('shared.error')
        <form method="post" action="{{ route('lesson.update', ['course_id'=>$course->id, 'id'=>$lesson->id]) }}"
              enctype="multipart/form-data">
          {{ method_field('PUT') }}
          @csrf
          <input type="hidden" value="{{$lesson->id}}" name="id">
          <input type="hidden" value="{{$course->id}}" name="course_id">
          <input type="hidden" name="is_first" value="0" id="is_first">


          <label for="title" class="text-md-right font-weight-bold">Titel</label>
          @include('shared.form_required', ['label' => 'Titel', 'id' => 'title', 'name'=> 'title', 'type'=> 'text', 'value' => $lesson->title
          , 'class' => 'form-control'])
          <label for="inhoud" class="text-md-right font-weight-bold">Inhoud</label>
          @include('shared.textarea', ['label' => 'Inhoud', 'id' => 'inhoud', 'name' => 'content', 'value' => $lesson->content, 'required' => true
          , 'class' => 'form-control'])
          @include('shared.form', ['label' => 'Media', 'name' => 'media[]', 'type' => 'file'
          , 'class' => ''])
          @include('course::shared.levels', ['levels' => $levels])
          @include('course::shared.select_lesson', ['lessons' => $lessons, 'id' => $lesson->id, 'course' => $course, 'next_id' => $lesson->next_id])

          @if($course->firstLesson->id != $lesson->id)
            <div class="form-group">
              <label for="is_first" class="text-md-right font-weight-bold">Eerste les?</label>
            </div>
            <div class="form-group">
                <input type="checkbox" checked data-toggle="toggle" data-on="Ja" data-off="Nee" name="is_first" value="1" id="is_first">
            </div>
          @endif

          @include('shared.submit_button')

  @section('backup')
  {{-- Including the form title partial --}}
  @include('shared.form_title', ['title' => "Pas een les aan in de cursus $course->name"])
  @include('shared.error')
  <form method="post" action="{{ route('lesson.update', ['course_id'=>$course->id, 'id'=>$lesson->id]) }}"
        enctype="multipart/form-data">
    {{ method_field('PUT') }}
    @csrf
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

        <div class="col-md-6">
          <input type="checkbox" name="is_first" value="1" id="is_first">
        </div>
      </div>
    @endif

    @include('shared.submit_button')
  </form>
  @endsection

@endsection
