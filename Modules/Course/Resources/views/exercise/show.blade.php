{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  @include('shared.form_title', ['title'=>$exercise->title])
  <b>{{$exercise->level->name}}</b>
  <p>Dit is @if($exercise->is_final) een @else geen @endif eindopdracht</p>
  <hr>
  <p>Media:</p>
  @if($exercise->media_content)
    {{$exercise->media_content}}
    @else
      Geen media
    @endif
  <p>{{$exercise->content}}</p>
  <p>
    <form action="{{ route('progress.create') }}" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
      <input type="hidden" name="course_id" value="{{ $exercise->course->id }}"/>
      <input type="hidden" name="exercise_id" value="{{ $exercise->id }}"/>
      <input type="submit" class="btn btn-primary btn-organisation" value="Opdracht afronden"/>
    </form>
  </p>

@endsection