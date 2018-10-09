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
  <div class="row">
    {{-- Course loop --}}
    @foreach($courses as $course)
      {{-- Course items --}}
      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="{{route('course.show', ['id'=>$course->id])}}" class="no-link">
          <div class="m-2" style="color:{{"#000"}}">
            <div class="card overflow-h custom-card" style="background-color: {{$course->color}}; color:{{"#fff"}};">
              <div class="card-body text-center text-white">
                <h3 class="card-title mt-1 mb-3">{{  $course->name }}</h3>
                <img class="card-img-top m-a img-h-250" src="{{ ($course->media) ? $course->media->content : null}}"
                     alt="Course logo">
                <p class="text-truncate pt-2">{{ $course->description }}</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
@endsection
