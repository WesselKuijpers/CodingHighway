{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>{{$lesson->title}}</h1>
    <p><b>Moeilijkheid:</b> {{$lesson->level->name}}</p>
    <p>{{$lesson->content}}</p>


@endsection
