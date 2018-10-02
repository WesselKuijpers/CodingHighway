{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <ul>
        @foreach($courses as $course)
            <li><a href="/course/{{$course->id}}">{{$course->name}}</a></li>
        @endforeach
    </ul>

@endsection
