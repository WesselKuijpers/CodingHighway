@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <h1>Nakijkpaneel voor {{$organisation->name}}</h1>
      <hr>
      @foreach($students as $student)
        @if($student->isUser())
          <h3>{{$student->getFullname()}}</h3>
          @foreach($courses as $course)
          <hr>
            <h4>{{$course->name}}</h4>
            @foreach($course->exercises as $exercise)
                <div class="row">
                  <div class="col-5">
                    <h6>{{$exercise->title}}</h6>
                  </div>
                  <div class="col-3">
                    @if($exercise->solutions->where('user_id', $student->id)->count() == 1)
                      <a href="{{route('teacherCheckShow', ['id' => $exercise->solutions->where('user_id', $student->id)->first()->id])}}" class="btn btn-success">Kijk na</a>
                    @else
                      <a href="#" class="btn btn-danger disabled">Niets ingeleverd</a>
                    @endif
                  </div>
                </div>
                <br>
            @endforeach
          @endforeach
          <hr>
        @endif
      @endforeach
    </div>
  </div>
@endsection