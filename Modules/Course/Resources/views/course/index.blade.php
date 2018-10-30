{{-- TODO add db content --}}
{{-- Page to show all courses --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  {{-- Title --}}
  <h2 class="text-center page-header">Alle cursussen</h2>
  <div class="col-10 offset-1 mb-3">
    <hr>
  </div>
  <div class="row d-flex justify-content-between">
    {{-- Course loop --}}
    @foreach($courses as $course)
      {{-- Course items --}}
      <div
              class="col-xl-3 col-lg-3 col-md-3 col-sm-12 project wow animated animated3 fadeInLeft custom-card mb-3"
              @if (!empty($course->media->content))
              style="background-image: url({{ $course->media->content }}) !important"
              @endif
      >
        <div class="project-hover">
          <h2>{{$course->name}}</h2>
          <p class="text-truncate">{{$course->description}}</p>
          <hr/>
          <a href="{{ route('course.show', ['id' => $course->id]) }}" class="no-link">Bekijk</a>
        </div>
      </div>
    @endforeach
  </div>
@endsection
