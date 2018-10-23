{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>{{$course->name}}</h1>
    <p>{{$course->description}}</p>
    <h3>Lessen:</h3>
    
    @if(count($lessons) == 0)
        <p>Geen lessen voor deze cursus gevonden</p>
    @else
        @include('course::shared.progress_bar', ['progresses' => Auth::user()->progress($course->id)->where('lesson_id', "!=", null)->count(), 'max' => count($lessons)])
        <ul>
            @foreach($lessons as $lesson)
                <li><a href="{{ route('lesson.show', ['course_id' => $course->id, 'id'=> $lesson->id]) }}">{{$lesson->title}}</a></li>
            @endforeach
        </ul>
    @endif
    <h3>Opdrachten:</h3>
    @if(count($exercises) == 0)
        <p>Geen opdrachten voor deze cursus gevonden</p>
    @else
        @include('course::shared.progress_bar', ['progresses' => Auth::user()->progress($course->id)->where('exercise_id', "!=", null)->count(), 'max' => count($exercises)])
        <ul>
            @foreach($exercises as $exercise)
                <li><a href="{{ route('exercise.show', ['course_id' => $course->id, 'id'=> $exercise->id]) }}">{{$exercise->title}}</a></li>
            @endforeach
        </ul>
    @endif

@endsection