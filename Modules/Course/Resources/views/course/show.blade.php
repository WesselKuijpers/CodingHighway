{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>{{$course->name}}</h1>
    <p>{{$course->description}}</p>
    <h3>Lessen:</h3>
    <ul>
        @foreach($lessons as $lesson)
            <li><a href="/course/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->title}}</a></li>
        @endforeach
    </ul>
    <h3>Opdrachten:</h3>
    <ul>
        @for($i = 0; $i < count($exercises); $i++)
            <li><a href="/course/{{$course->id}}/exercise/{{$exercises[$i]->id}}">Opdracht {{$i+1}}</a></li>
        @endfor
    </ul>

@endsection