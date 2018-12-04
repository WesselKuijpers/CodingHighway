@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <h1>Nakijkpaneel voor {{$organisation->name}}</h1>
      <hr>
      <ul class="list-group">
          @foreach($students as $student)
            @if($student->isUser())
              <li class="list-group-item">{{ $student->getFullname() }}
                <button type="button" class="btn btn-primary btn-organisation float-right" data-toggle="collapse" data-target="#collapseStudent{{ $student->id }}" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-chevron-down"></i>
                </button>
              </li>
              <div class="collapse" id="collapseStudent{{ $student->id }}">
                  <div class="card card-body">
                      <p><strong>Email: </strong>{{ $student->email }}</p>
                      <h4>Voortgang:</h4>
                      <ul class="list-group">
                        @foreach($courses as $course)
                            <li class="list-group-item">{{ $course->name }}
                                @if($student->progress($course->id)->where('exercise_id', null)->count() != 0)
                                  <i class="fas fa-eye"></i>
                                @endif
                                <button type="button" class="btn btn-primary btn-organisation float-right" data-toggle="collapse" data-target="#collapseCourse{{ $course->id }}{{ $student->id }}" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </li>
                            <div class="collapse" id="collapseCourse{{ $course->id }}{{ $student->id }}">
                              <div class="card card-body">
                                <p>Lessen: 
                                    <div
                                        class="progressbar"
                                        data-user_id="{{ $student->id }}"
                                        data-course_id="{{ $course->id }}"
                                        data-lessons="1"
                                        data-token="{{ $student->api_token }}"
                                    >
                                    </div>
                                </p>
                                
                                <p>Opdrachten: 
                                    <div
                                        class="progressbar"
                                        data-user_id="{{ $student->id }}"
                                        data-course_id="{{ $course->id }}"
                                        data-exercises="1"
                                        data-token="{{ $student->api_token }}"
                                    >
                                    </div>
                                </p>
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
                                  @if($exercise->solutions->where('user_id', $student->id)->count() == 1)
                                    @if($exercise->solutions->where('user_id', $student->id)->first()->reviews()->where('user_id', Auth::id())->count() <= 1)
                                      <div class="col-4">
                                        <strong>Je hebt al een beoordeling gegeven.</strong>
                                      </div>
                                    @endif
                                  @endif
                                </div>
                                <br>
                              @endforeach
                            </div>
                          </div>
                        @endforeach
                      </ul>
                  </div>
              </div>
            @endif
          @endforeach
        </ul>
    </div>
  </div>
@endsection