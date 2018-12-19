{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  @if(empty($failed))
    <form method="POST" action="{{route('planning.store')}}">
      <div class="row">
        <div class="col-12">
          <ul class="list-group">
            @csrf
            @foreach($courses as $course)
              <li class="list-group-item">{{ $course->name }}
                <button type="button" class="btn btn-primary btn-organisation float-right" data-toggle="collapse"
                        data-target="#collapseCourse{{ $course->id }}" aria-expanded="false"
                        aria-controls="collapseExample">
                  <i class="fas fa-chevron-down"></i>
                </button>
              </li>
              <div class="collapse" id="collapseCourse{{ $course->id }}">
                <div class="card card-body">
                  <div class="row">
                    <div class="col-6">
                      <h4>Lessen:</h4>
                      <hr>
                      @foreach($course->lessons as $lesson)
                        <div class="row">
                          <div class="col-10">
                            <label for="lcheck{{$lesson->id}}">{{$lesson->title}}</label>
                          </div>
                          <div class="col-1">
                            <input id="lcheck{{$lesson->id}}" type="checkbox" name="lessons[]" value={{$lesson->id}}>
                          </div>
                        </div>
                        <br>
                      @endforeach
                    </div>
                    <div class="col-6">
                      <h4>Opdrachten:</h4>
                      <hr>
                      @foreach($course->exercises as $exercise)
                        <div class="row">
                          <div class="col-10">
                            <label for="echeck{{$exercise->id}}">{{$exercise->title}}</label>
                          </div>
                          <div class="col-1">
                            <input id="echeck{{$exercise->id}}" type="checkbox" name="exercises[]" value={{$exercise->id}}>
                          </div>
                        </div>
                        <br>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </ul>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Opslaan" class="btn btn-primary btn-organisation">
        </div>
      </div>
    </form>
  @else
    <h1>Volgende kaarten zijn niet op tijd afgerond:</h1>
    <br>
    <form method="POST" action="{{route('reason.store')}}">
      @csrf
      @if(!empty($failed['lessons']))
        <div class="row">
          <div class="col-12">
            <h2>Lessen:</h2>
            @foreach($failed['lessons'] as $failedLessonCard)
              <hr>
              <h5>{{$failedLessonCard->lesson->title}}</h5>
              <textarea class="form-control" name="lessons[{{$failedLessonCard->id}}]" required rows="5"></textarea>
            @endforeach
          </div>
        </div>
      @endif
      <br>
      @if(!empty($failed['exercises']))
        <div class="row">
          <div class="col-12">
            <h2>Opdrachten:</h2>
            @foreach($failed['exercises'] as $failedExerciseCard)
              <hr>
              <h3>{{$failedExerciseCard->exercise->title}}</h3>
              <textarea class="form-control" name="exercises[{{$failedExerciseCard->id}}]" required rows="5"></textarea>
            @endforeach
          </div>
        </div>
      @endif
      <br>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Opslaan" class="btn btn-primary btn-organisation">
        </div>
      </div>
    </form>
  @endif
@endsection