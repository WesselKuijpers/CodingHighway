{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title --}}
    @include('shared.form_title', ['title' => "Creeër een cursus"])

    {{-- Including the create form partial --}}
    @include('course::shared.course_create_form')

@endsection
