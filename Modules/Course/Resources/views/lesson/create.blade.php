{{-- Page to create a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe les in de cursus $course->name"])
    @include('shared.error')
    <form method="post" action="/course/{{$course['id']}}/lesson" enctype="multipart/form-data">
        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])

        <div class="row">
            <label for="media" class="col-md-4 col-form-label text-md-right font-weight-bold">Media</label>
            <div class="col-md-6">
                <input type="file" id="media" name="media[]" multiple>
            </div>
        </div>

        @include('course::shared.levels', ['levels' => $levels])
        @include('course::shared.select_lesson', ['lessons' => $course->lessons])

        {{ csrf_field() }}
        <input type="hidden" value="{{$course['id']}}" name="course_id">

        @include('shared.submit_button')
    </form>

@endsection