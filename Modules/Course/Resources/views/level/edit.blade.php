{{-- Page to edit a level --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Pas de moeilijkheid aan"])

    {{-- Including the update form partial --}}
    @include('course::shared.level_update_form', ['level' => $level])

@endsection