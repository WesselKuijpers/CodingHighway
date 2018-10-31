{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  <h1>{{$lesson->title}}</h1>
  <p><b>Moeilijkheid:</b> {{$lesson->level->name}}</p>
  <p>{{$lesson->content}}</p>
    <p>
      <form action="{{ route('progress.create') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
        <input type="hidden" name="course_id" value="{{ $lesson->course->id }}"/>
        <input type="hidden" name="lesson_id" value="{{ $lesson->id }}"/>
        <input type="submit" class="btn btn-primary btn-organisation" value="Les afronden"/>
      </form>
    </p>


@endsection
