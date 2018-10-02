{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <b>{{$exercise->level->name}}</b>
    <p>dit is @if($exercise->is_final) een @else geen @endif eindopdracht</p>
    <hr>
    <p>{{$exercise->content}}</p>

@endsection