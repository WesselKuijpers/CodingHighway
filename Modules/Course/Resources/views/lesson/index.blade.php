{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
    <h1>Lessen voor de cursus {{$course->name}}</h1>
    <p>@if(Auth::user()->hasRole('sa'))<a href="{{ route('lesson.create', ['course_id'=>$course->id]) }}" class="btn btn-primary btn-organisation">Maak een les</a>@endif</p>

    @if($course->lessons->count() != 0)
        <table class="table">
            <tr>
                <th>Naam:</th>
                <th>Moeilijkheid:</th>
            </tr>
            @foreach($lessons as $lesson)
                <tr>
                    <td><a href="{{ route('lesson.show', ['course_id'=>$course->id, 'id'=>$lesson->id]) }}">{{$lesson->title}}</a></td>
                    <td>@if($lesson->level != null) {{$lesson->level->name}} @else Geen moeilijkheid @endif</td>
                </tr>
            @endforeach
        </table>
    @else
        <p>Geen lessen gevonden. @if(Auth::user()->hasRole('sa'))<a href="{{ route('lesson.create', ['course_id'=>$course->id]) }}">Maak er een aan!</a>@endif</p>
    @endif

@endsection
