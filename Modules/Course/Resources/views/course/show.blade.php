{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="col-12"></div>
    <h1>{{$course->name}}</h1>
    @permission('course.create')
      @if($course->startExam == null)
        <a href="{{ route('startExam.create', ['course_id' => $course->id]) }}" class="btn btn-danger">Maak eerst een starttoets aan!</a>
      @else
        <div class="row">
          <div class="col-2">
            <a href="{{ route('startExam.show', ['course_id' => $course->id, 'id' => $course->startExam->id]) }}" class="btn btn-primary btn-organisation">Bekijk de starttoets</a>
          </div>
          <div class="col-2">
            <form method="POST" action="{{route('startExam.destroy', ['course_id' => $course->id, 'id' => $course->startExam->id])}}">
              @method('DELETE')
              @csrf
              <input type="hidden" value={{$course->startExam->id}} name="id">
              <input type="submit" value="Verwijderen" class="btn btn-danger">
            </form>
          </div>
        </div>
      @endif
      <br>
    @endpermission
    <p>{{$course->description}}</p>
    @if(count(Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->get()) != 0)
      <form action="{{ route('progress.reset') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ Auth::id() }}" name="user_id"/>
        <input type="hidden" value="{{ $course->id }}" name="course_id"/>
        <input type="submit" class="btn btn-danger" value="Voortgang terugzetten"/>
      </form>
    @endif
    <br>
    <h3>Lessen</h3>
    @if(Auth::user()->hasRole('sa'))
      @if($course->startExam != null)
        <a href="{{ route('lesson.create', ['course_id'=>$course->id]) }}" class="btn btn-primary btn-organisation">Maak een les</a>
      @else
        <p>Maak eerst een starttoets aan!</p>
      @endif
    @endif
    <br>
    <br>
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
    <h3>Opdrachten</h3>
    @if($course->startExam != null)
      <a href="{{ route('exercise.create', ['course_id'=>$course->id]) }}" class="btn btn-primary btn-organisation">Maak een opdracht</a>
    @else
      <p>Maak eerst een starttoets aan!</p>
    @endif
    <br>
    <br>
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
  </div>
@endsection