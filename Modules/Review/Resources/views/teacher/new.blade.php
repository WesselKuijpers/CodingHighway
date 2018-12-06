@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <h1>Nakijkpaneel voor {{$organisation->name}}</h1>
    </div>
  </div>
  <div class="row">
    <div class="accordion col-12" id="accordionExample">
      @foreach($students as $student)
        @if($student->isUser())
          <div class="studentcheck" data-courses="{{ $courses->toJson() }}" data-student="{{ $student->toJson() }}"></div>
        @endif
      @endforeach
    </div>
  </div>
@endsection
