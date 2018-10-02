{{-- Page to edit a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title --}}
    @include('shared.form_title', ['title' => "Pas een cursus aan"])

    {{-- Including the update form partial --}}
    @include('course::shared.course_update_form', ['course' => $course])

@endsection
