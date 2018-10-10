{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  <h1>{{$lesson->title}}</h1>
  <p><b>Moeilijkheid:</b> {{$lesson->level->name}}</p>
  <p>{{$lesson->content}}</p>
  @if($lesson->next)
    <p>
      <a
        href="{{ route('lesson.show', ['course_id'=>$lesson->course->id, 'id' => $lesson->next->id]) }}"
        class="btn btn-primary">
        Next Lesson</a>
    </p>
  @endif


@endsection
