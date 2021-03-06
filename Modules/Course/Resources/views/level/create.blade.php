{{-- Page to create a level --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe moeilijkheid"])
    @include('shared.error')
    <form method="post" action="{{ route('level.store') }}">
        @include('shared.form_required', ['label' => 'Moeilijkheid', 'name'=> 'name', 'type'=> 'text',
        'class' => 'form-control', 'value' => old('name')])
        {{ csrf_field() }}
        @include('shared.submit_button')
    </form>

@endsection