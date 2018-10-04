{{-- Page to edit a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Pas een les aan in de cursus $course->name"])
    @include('shared.error')
    <form method="post" action="/course/{{$course['id']}}/lesson/{{$lesson['id']}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}

        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'value' => $lesson['title']
        , 'class' => 'form-control'])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'value' => $lesson['content'], 'required' => true
        , 'class' => 'form-control'])
        @include('shared.form', ['label' => 'Media', 'name' => 'media[]', 'type' => 'file',
            'class' => ''])

        @include('course::shared.levels', ['levels' => $levels])
        @include('course::shared.select_lesson', ['lessons' => $course->lessons])

        {{ csrf_field() }}

        <input type="hidden" value="{{$course['id']}}" name="course_id">
        @include('shared.submit_button')
    </form>

@endsection
