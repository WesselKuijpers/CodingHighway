{{-- Page to edit an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title --}}
    @include('shared.form_title', ['title' => "pas een opdracht in de cursus $course->name"])

    {{-- Including the update form partial --}}
    @include('course::shared.exercise_update_form', ['course' => $course, 'exercise' => $exercise, 'levels' => $levels])

@endsection