{{-- Page to create a level --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe moeilijkheid"])

    {{-- Including the create form partial --}}
    @include('course::shared.level_create_form')

@endsection