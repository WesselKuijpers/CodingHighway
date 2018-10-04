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
        <a href="{{route('course', ['id'=> $course->id])}}" class="no-link">
          <div class="m-2" style="color:{{"#000"}}">
            <div class="card h-100 overflow-h custom-card" style="background-color: {{"#333"}}; color:{{"#fff"}};">
              <div class="card-body text-center text-white">
                <h5 class="card-title">$course->name</h5>
                <img class="card-img m-a h-200px w-auto" src="https://ubisafe.org/images/transparent-language-ruby.png"
                     alt="Course logo">
                <p>{{ $course->description }}</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    @endforeach
  </div>
@endsection
