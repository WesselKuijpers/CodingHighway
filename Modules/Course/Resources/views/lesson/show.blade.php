{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <h1>{{$lesson->title}}</h1>
  @if($lesson->level != null)
    <p><b>Moeilijkheid:</b> {{$lesson->level->name}}</p>
  @endif
  <p>{!! $lesson->content !!}</p>
  <p>
    @foreach($lesson->media as $media)
      <a target="_blank" class="btn btn-primary btn-organisation" href="{{ $media->content }}">File {{ $media->id }}</a>
    @endforeach
  </p>
  @if($lesson->exercises->count() != 0)
    <h4>Gerelateerde opdrachten:</h4>
    <ul>
      @foreach ($lesson->exercises as $exercise)
          <li>
            <a href="{{route('exercise.show', ['course_id' => $lesson->course->id, 'id' => $exercise->id])}}">{{$exercise->title}}</a>
          </li>
      @endforeach
    </ul>
  @endif
  <p>
  <form action="{{ route('progress.create') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
    <input type="hidden" name="course_id" value="{{ $lesson->course->id }}"/>
    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}"/>
    <input type="submit" class="btn btn-primary btn-organisation" value="Les afronden"/>
    <input type="button" class="btn btn-primary" value="Terug" onclick="location.href='{{ route('course.show',
    ['course_id' => $lesson->course->id])}}'">
  </form>
  </p>
@endsection
