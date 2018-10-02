{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
    <h1>Lessen voor de cursus {{$course->name}}</h1>


    <table>
        <tr>
            <th>Naam:</th>
            <th>Moeilijkheid:</th>
        </tr>
        @foreach($lessons as $lesson)
            <tr>
                <td><a href="/course/{{$course->id}}/lesson/{{$lesson->id}}">{{$lesson->title}}</a></td>
                <td>{{$lesson->level->name}}</td>
            </tr>
        @endforeach
    </table>

@endsection
