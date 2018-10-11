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
    @if(count($lessons) != 0)
      @include('course::shared.select_lesson', ['lessons' => $lessons])
    @endif
    <div class="form-group row">
      <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste opdracht?</label>

      <div class="col-md-6">
        <input type="checkbox" name="is_first" value="1" id="is_first">
      </div>
    </div>

    @include('shared.submit_button')
  </form>

@endsection
