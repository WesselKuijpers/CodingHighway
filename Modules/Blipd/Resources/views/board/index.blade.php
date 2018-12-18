{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row mt-3 mr-3">
    <div class="col-12 text-right">
      <a href="{{route('planning.create')}}" class="btn btn-primary btn-organisation">Maak een planning</a>
    </div>
  </div>
  <div class="row">
      @if(!empty($planning))
        <table class="table table-bordered text-center pt-2 mt-2">
            <thead>
            <tr>
                <th scope="col"></th>
                @foreach($states as $state)
                    <th scope="col">{{$state->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @if($planning->lessons->count() != 0)
              <tr id="lessonBoard">
                  <th scope="row">Lessen</th>
                  @foreach($states as $state)
                    <td id="lstate{{$state->id}}">
                        @foreach($planning->lessons->where('state_id', $state->id) as $lessonCard)
                          <div class="card blipd-card m-3" id="lcard{{$lessonCard->id}}" draggable="true">
                              <div class="card-body">
                                <a href="{{route('lesson.show', ['course_id' => $lessonCard->lesson->course_id, 'id' => $lessonCard->lesson->id])}}">
                                  <h3>{{$lessonCard->lesson->title}}</h3>
                                </a>
                                <a href="{{route('course.show', ['id' => $lessonCard->lesson->course_id])}}">
                                  <p>{{$lessonCard->lesson->course->name}}</p>
                                </a>
                                <p>Punten: 5</p>
                              </div>
                          </div>
                        @endforeach
                    </td>
                  @endforeach
              </tr>
            @endif
            @if($planning->exercises->count() != 0)
              <tr id="exerciseBoard">
                  <th scope="row">Opdrachten</th>
                  @foreach($states as $state)
                    <td id="estate{{$state->id}}">
                        @foreach($planning->exercises->where('state_id', $state->id) as $exerciseCard)
                          <div class="card blipd-card m-3" id="ecard{{$exerciseCard->id}}" draggable="true">
                              <div class="card-body">
                                <a href="{{route('exercise.show', ['course_id' => $exerciseCard->exercise->course_id, 'id' => $exerciseCard->exercise->id])}}">
                                  <h3>{{$exerciseCard->exercise->title}}</h3>
                                </a>
                                <a href="{{route('course.show', ['id' => $exerciseCard->exercise->course_id])}}">
                                  <p>{{$exerciseCard->exercise->course->name}}</p>
                                </a>
                                <p>Punten: 5</p>
                              </div>
                          </div>
                        @endforeach
                    </td>
                  @endforeach
              </tr>
            @endif
            </tbody>
          </table>
        @else
          <div class="col-12 text-center">
            <p>Geen planning gevonden, <a href="{{route('planning.create')}}"">Maak er een aan!</a></p>
          </div>
        @endif
    </div>
@endsection
@section('scripts')
  @if(!empty($planning))
    @foreach($planning->lessons as $lesson)
      <script type="text/javascript">
        $('#lcard{{$lesson->id}}').bind('dragstart', function(event) {
          event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
        });
      </script>
    @endforeach
    @foreach($planning->exercises as $exercise)
      <script type="text/javascript">
        $('#ecard{{$exercise->id}}').bind('dragstart', function(event) {
          event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
        });
      </script>
    @endforeach
    @foreach($states as $state)
      <script type="text/javascript">
        $('#lstate{{$state->id}}').bind('dragover', function(event) {
          event.preventDefault();
        });
        $('#estate{{$state->id}}').bind('dragover', function(event) {
          event.preventDefault();
        });
        $('#lstate{{$state->id}}').bind('drop', function(event) {
          var notecard = event.originalEvent.dataTransfer.getData("text/plain");
          if(event.target.id.includes("lstate") && notecard.includes("lcard")){
            event.target.appendChild(document.getElementById(notecard));
            event.preventDefault();
            $.post("{{route('ApiBlipdLesson')}}?api_token={{Auth::user()->api_token}}", {lesson_id : notecard, state_id : event.target.id}, function(data){console.log(data)})
          }
        });
        $('#estate{{$state->id}}').bind('drop', function(event) {
          var notecard = event.originalEvent.dataTransfer.getData("text/plain");
          if(event.target.id.includes("estate") && notecard.includes("ecard")){
            event.target.appendChild(document.getElementById(notecard));
            event.preventDefault();
            $.post("{{route('ApiBlipdExercise')}}?api_token={{Auth::user()->api_token}}", {exercise_id : notecard, state_id : event.target.id}, function(data){console.log(data)})
          }
        });
      </script>
    @endforeach
  @endif
@endsection
