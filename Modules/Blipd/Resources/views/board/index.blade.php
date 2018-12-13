{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row">
        <table class="table table-bordered text-center pt-2 mt-2"">
            <thead>
            <tr>
                <th scope="col"></th>
                @foreach($states as $state)
                    <th scope="col">{{$state->name}}</th>
                @endforeach
                {{-- <th scope="col">Backlog</th>
                <th scope="col">In progress</th>
                <th scope="col">Done</th>
                <th scope="col">Failure</th> --}}
            </tr>
            </thead>
            <tbody>
            <tr id="lessonBoard">
                <th scope="row">Lessen</th>
                @foreach($states as $state)
                  <td id="lstate{{$state->id}}">
                      @foreach($planning->lessons->where('state_id', $state->id) as $lessonCard)
                        <div class="card blipd-card m-3" id="lcard{{$lessonCard->id}}" draggable="true">
                            <div class="card-body">{{$lessonCard->lesson->title}}</div>
                        </div>
                      @endforeach
                  </td>
                @endforeach
            </tr>
            <tr id="exerciseBoard">
                <th scope="row">Opdrachten</th>
                @foreach($states as $state)
                  <td id="estate{{$state->id}}">
                      @foreach($planning->exercises->where('state_id', $state->id) as $exerciseCard)
                        <div class="card blipd-card m-3" id="ecard{{$exerciseCard->id}}" draggable="true">
                            <div class="card-body">{{$exerciseCard->exercise->title}}</div>
                        </div>
                      @endforeach
                  </td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
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
        if(!event.target.classList.contains("card-body") && notecard.includes("lcard")){
          event.target.appendChild(document.getElementById(notecard));
          event.preventDefault();
          $.post("{{route('ApiBlipdLesson')}}?api_token={{Auth::user()->api_token}}", {lesson_id : notecard, state_id : event.target.id}, function(data){console.log(data)})
        }
      });
      $('#estate{{$state->id}}').bind('drop', function(event) {
        var notecard = event.originalEvent.dataTransfer.getData("text/plain");
        if(!event.target.classList.contains("card-body") && notecard.includes("ecard")){
          event.target.appendChild(document.getElementById(notecard));
          event.preventDefault();
          $.post("{{route('ApiBlipdExercise')}}?api_token={{Auth::user()->api_token}}", {exercise_id : notecard, state_id : event.target.id}, function(data){console.log(data)})
        }
      });
    </script>
  @endforeach
@endsection
