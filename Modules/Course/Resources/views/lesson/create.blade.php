{{-- Page to create a lesson --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe les in de cursus $course->name"])

    {{-- Including the create form partial --}}
    @include('course::shared.lesson_create_form', ['course' => $course, 'levels' => $levels])

@endsection