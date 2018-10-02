{{-- Page to edit a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Pas een opdracht aan in de cursus $course->name"])
    {{-- Including the update form partial --}}
    @include('course::shared.lesson_update_form', ['lesson' => $lesson, 'course' => $course, 'levels' => $levels])

@endsection
