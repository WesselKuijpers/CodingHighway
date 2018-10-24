{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <h1>{{$course->name}}</h1>
  <p>{{$course->description}}</p>
  <form action="{{ route('progress.reset') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ Auth::id() }}" name="user_id"/>
    <input type="hidden" value="{{ $course->id }}" name="course_id"/>
    <input type="submit" class="btn btn-danger" value="Voortgang terugzetten"/>
  </form>
  <br>
  <h3>Lessen:</h3>

  @if(count($lessons) == 0)
    <p>Geen lessen voor deze cursus gevonden</p>
  @else
    <div
      class="progressbar"
      data-user_id="{{ Auth::id() }}"
      data-course_id="{{ $course->id }}"
      data-lessons="1"
      data-token="{{ Auth::user()->api_token }}"
    >
    </div>
    <ul>
      @foreach($lessons as $lesson)
        <li><a
            href="{{ route('lesson.show', ['course_id' => $course->id, 'id'=> $lesson->id]) }}">{{$lesson->title}}</a>
        </li>
      @endforeach
    </ul>
  @endif
  <h3>Opdrachten:</h3>
  @if(count($exercises) == 0)
    <p>Geen opdrachten voor deze cursus gevonden</p>
  @else
    <div
      class="progressbar"
      data-user_id="{{ Auth::id() }}"
      data-course_id="{{ $course->id }}"
      data-exercises="1"
      data-token="{{ Auth::user()->api_token }}"
    >
    </div>
    <ul>
      @foreach($exercises as $exercise)
        <li><a
            href="{{ route('exercise.show', ['course_id' => $course->id, 'id'=> $exercise->id]) }}">{{$exercise->title}}</a>
        </li>
      @endforeach
    </ul>
  @endif

@endsection