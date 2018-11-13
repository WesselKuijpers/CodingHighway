{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  <h1>Opdrachten voor de cursus {{$course->name}}</h1>
  <p>@if(Auth::user()->hasRole('sa'))<a href="{{ route('exercise.create', ['course_id'=>$course->id]) }}" class="btn btn-primary btn-organisation">Maak een opdracht</a>@endif</p>

  <h3>Reguliere Opdrachten</h3>
  @if($course->exercises->where('is_final', false)->count() != 0)
    <table class="table">
      <tr>
        <th>Naam:</th>
        <th>Moeilijkheid:</th>
      </tr>
      @foreach($course->exercises->where('is_final', false) as $exercise)
        <tr>
          <td>
            <a
              href="{{ route('exercise.show', ['course_id'=>$course->id, 'id'=>$exercise->id]) }}">{{$exercise->title}}</a>
          </td>
          <td>@if($exercise->level != null) {{$exercise->level->name}} @else Geen moeilijkheid @endif</td>
        </tr>
      @endforeach
    </table>
  @else
    <p>Geen reguliere opdrachten gevonden</p>
  @endif
  <br>
  <h3>Eindopdrachten</h3>
  @if($course->exercises->where('is_final', true)->count() != 0)
    <table class="table">
      <tr>
        <th>Naam:</th>
        <th>Moeilijkheid:</th>
      </tr>
      @foreach($course->exercises->where('is_final', true) as $exercise)
        <tr>
          <td>
            <a
              href="{{ route('exercise.show', ['course_id'=>$course->id, 'id'=>$exercise->id]) }}">{{$exercise->title}}</a>
          </td>
          <td>@if($exercise->level != null) {{$exercise->level->name}} @else Geen moeilijkheid @endif</td>
        </tr>
      @endforeach
    </table>
  @else
    <p>Geen eindopdrachten gevonden</p>
  @endif
@endsection
