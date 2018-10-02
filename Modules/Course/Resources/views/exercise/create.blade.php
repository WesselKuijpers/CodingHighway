{{-- Page to create an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe opdracht in de cursus $course->name"])

    {{-- Including the create form partial --}}
    @include('course::shared.exercise_create_form', ['course' => $course, 'levels' => $levels])

@endsection