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
    @foreach($exercises as $exercise)
      @if (!$exercise->is_final)
        <tr>
          <td>
            <a
              href="{{ route('exercise.show', ['course_id'=>$course->id, 'id'=>$exercise->id]) }}">{{$exercise->title}}</a>
          </td>
          <td>{{$exercise->level->name}}</td>
        </tr>
      @endif
    @endforeach
  </table>
  <br>
  <h3>Eindopdrachten</h3>
  <table>
    <tr>
      <th>Naam:</th>
      <th>Moeilijkheid:</th>
    </tr>
    @foreach($exercises as $exercise)
      @if ($exercise->is_final)
        <tr>
          <td>
            <a
              href="{{ route('exercise.show', ['course_id'=>$course->id, 'id'=>$exercise->id]) }}">{{$exercise->title}}</a>
          </td>
          <td>{{$exercise->level->name}}</td>
        </tr>
      @endif
    @endforeach
  </table>
@endsection
