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

        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])

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
              <input type="checkbox" name="is_first" value="1" id="is_first" data-toggle="toggle" data-on="Ja" data-off="Nee">
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
@endsection

@section('backup')
  {{-- Including the form title partial --}}
  @include('shared.form_title', ['title' => "Creeër een nieuwe les in de cursus $course->name"])
  @include('shared.error')
  <form method="post" action="{{ route('lesson.store', ['course_id'=>$course->id]) }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" value="{{$course['id']}}" name="course_id">
    <input type="hidden" name="is_first" value="0" id="is_first">

    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])

    <div class="row">
      <label for="media" class="col-md-4 col-form-label text-md-right font-weight-bold">Media</label>
      <div class="col-md-6">
        <input type="file" id="media" name="media[]" multiple>
      </div>
    </div>

    @include('course::shared.levels', ['levels' => $levels])
    @if($course->lessons->count() != 0)
      @include('course::shared.select_lesson', ['lessons' => $lessons, 'id' => 0])
      <div class="form-group row">
        <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste opdracht?</label>

        <div class="col-md-6">
          <input type="checkbox" name="is_first" value="1" id="is_first">
        </div>
      </div>
    @else
      <input type="hidden" name="is_first" value="1">
      <input type="hidden" name="next_id" value="0">
    @endif

    @include('shared.submit_button')
  </form>
@endsection