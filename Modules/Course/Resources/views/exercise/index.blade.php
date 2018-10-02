{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    <h1>Opdrachten voor de cursus {{$course->name}}</h1>

    <h3>Reguliere Opdrachten:</h3>
    <table>
        <tr>
            <th>Naam:</th>
            <th>Moeilijkheid:</th>
        </tr>
        @for($i = 1; $i <= count($exercises); $i++)
            @unless($exercises[$i-1]->is_final != false)
            <tr>
                <td>
                    <a href="/course/{{$course->id}}/exercise/{{$exercises[$i-1]->id}}">Opdracht {{$i}}</a>
                </td>
                <td>{{$exercises[$i-1]->level->name}}</td>
            </tr>
            @endunless
        @endfor
    </table>
    <br>
    <h3>Eindopdrachten</h3>
    <table>
        <tr>
            <th>Naam:</th>
            <th>Moeilijkheid:</th>
        </tr>
        @for($i = 1; $i <= count($exercises); $i++)
            @unless($exercises[$i-1]->is_final == false)
                <tr>
                    <td>
                        <a href="/course/{{$course->id}}/exercise/{{$exercises[$i-1]->id}}">Opdracht {{$i}}</a>
                    </td>
                    <td>{{$exercises[$i-1]->level->name}}</td>
                </tr>
            @endunless
        @endfor
    </table>
@endsection
