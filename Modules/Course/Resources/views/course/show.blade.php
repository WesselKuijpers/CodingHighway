{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>{{$course->name}}</h1>
    <p>{{$course->description}}</p>
    <h3>Lessen:</h3>
    @if(count($lessons) != 0)
        <ul>
            @foreach($lessons as $lesson)
                <li><a href="{{ route('lesson.show', ['course_id' => $course->id, 'id'=> $lesson->id]) }}">{{$lesson->title}}</a></li>
            @endforeach
        </ul>
    @endif
    @if(count($exercises) != 0)
        <h3>Opdrachten:</h3>
        <ul>
            @foreach($exercises as $exercise)
                <li><a href="{{ route('exercise.show', ['course_id' => $course->id, 'id'=> $exercise->id]) }}">{{$exercise->title}}</a></li>
            @endforeach
        </ul>
    @endif

@endsection