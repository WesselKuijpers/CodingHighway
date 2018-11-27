{{-- Page to show all courses --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  {{-- Title --}}
  <h2 class="text-center page-header">Alle cursussen</h2>
  @permission('course.create')
    <p class="text-center">
      <a href="{{ route('course.create') }}" class="btn btn-primary btn-organisation">Maak een cursus</a>
    </p>
  @endpermission
  <div class="col-10 offset-1 mb-3">
    <hr>
  </div>
  <div class="container">
    <div class="row">
       {{-- Course loop --}}
      @if ($courses->count() != 0)
        @foreach($courses as $course)
            <div class="col-sm-6 col-md-4">
                <div class="card custom-card course-card-{{$course->id}} mb-4" style="background-color: {{$course->color }}">
                    <img class="card-img-top img-fluid custom-img" src="@if (!empty($course->media->content)) {{ $course->media->content }} @else {{asset("storage/img/logo/placeholder.png")}} @endif" alt="Afbeelding niet gevonden">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        @if($course->startExam != null)
                          <a href="{{ route('course.show', ['id' => $course->id]) }}" class="no-link btn course-button-{{$course->id}}">Bekijk</a>
                        @else
                          <p>Deze cursus is nog niet klaar voor gebruik!</p>
                          @permission('course.create')
                            <a href="{{ route('course.show', ['id' => $course->id]) }}" class="no-link btn course-button-{{$course->id}}">Bekijk</a>
                          @endpermission
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
      @else
        <p>Er zijn nog geen cursussen. @if(Auth::user()->hasRole('sa'))<a href="{{ route('course.create') }}">Maak er een aan!</a>@endif
      @endif
    </div>
@endsection
