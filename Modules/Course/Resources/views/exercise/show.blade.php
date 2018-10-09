{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  <b>{{$exercise->level->name}}</b>
  <p>dit is @if($exercise->is_final) een @else geen @endif eindopdracht</p>
  <hr>
  <p>{{$exercise->content}}</p>
  @if($exercise->next)
    <p>
      <a
        href="{{ route('exercise.show', ['course_id'=>$exercise->course->id, 'id' => $exercise->next->id]) }}"
        class="btn btn-primary">
        Next Exercise</a>
    </p>
  @endif

@endsection