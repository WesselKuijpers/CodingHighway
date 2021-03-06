{{-- Page to edit a level --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title partial --}}
    @include('shared.form_title', ['title' => "Pas de moeilijkheid aan"])
    @include('shared.error')
    <form method="post" action="{{ route('level.update', ['level_id' => $level->id]) }}">
        <input type="hidden" name="id" value="{{ $level->id }}">
        {{ method_field('PUT') }}
        @include('shared.form_required', ['label' => 'Moeilijkheid', 'value' => $level['name'], 'name'=> 'name', 'type'=> 'text',
        'class' => 'form-control'])
        {{ csrf_field() }}
        @include('shared.submit_button')
    </form>

@endsection