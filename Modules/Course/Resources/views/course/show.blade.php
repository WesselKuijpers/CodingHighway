{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>{{$course->name}}</h1>
    <p>{{$course->description}}</p>
    <h3>Lessen:</h3>
    <ul>
        @foreach($course->lessons as $lesson)
            <li><a href="/course/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->title}}</a></li>
        @endforeach
    </ul>
    <h3>Opdrachten:</h3>
    <ul>
        @for($i = 1; $i <= count($course->exercises); $i++)
            <li><a href="/course/{{$course->id}}/exercise/{{$course->exercises[$i-1]->id}}">Opdracht {{$i}}</a></li>
        @endfor
    </ul>

@endsection