{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')

    @handheld
        @include('blipd::board.mobile')
    @endhandheld

    @desktop
        @include('blipd::board.desktop')
    @enddesktop

@endsection
@if(!empty($planning))
@section('scripts')
    @desktop
    @foreach($planning->lessons as $lesson)
        <script type="text/javascript">
            $('#lcard{{$lesson->id}}').bind('dragstart', function (event) {
                event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
            });
        </script>
    @endforeach
    @foreach($planning->exercises as $exercise)
        <script type="text/javascript">
            $('#ecard{{$exercise->id}}').bind('dragstart', function (event) {
                event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
            });
        </script>
    @endforeach
    @foreach($states as $state)
        <script type="text/javascript">
            $('#lstate{{$state->id}}').bind('dragover', function (event) {
                event.preventDefault();
            });
            $('#estate{{$state->id}}').bind('dragover', function (event) {
                event.preventDefault();
            });
            $('#lstate{{$state->id}}').bind('drop', function (event) {
                var notecard = event.originalEvent.dataTransfer.getData("text/plain");
                if (event.target.id.includes("lstate") && notecard.includes("lcard")) {
                    event.target.appendChild(document.getElementById(notecard));
                    event.preventDefault();
                    $.post("{{route('ApiBlipdLesson')}}?api_token={{Auth::user()->api_token}}", {
                        lesson_id: notecard,
                        state_id: event.target.id
                    }, function (data) {
                        console.log(data)
                    })
                }
            });
            $('#estate{{$state->id}}').bind('drop', function (event) {
                var notecard = event.originalEvent.dataTransfer.getData("text/plain");
                if (event.target.id.includes("estate") && notecard.includes("ecard")) {
                    event.target.appendChild(document.getElementById(notecard));
                    event.preventDefault();
                    $.post("{{route('ApiBlipdExercise')}}?api_token={{Auth::user()->api_token}}", {
                        exercise_id: notecard,
                        state_id: event.target.id
                    }, function (data) {
                        console.log(data)
                    })
                }
            });
        </script>
    @endforeach
    @enddesktop
    @handheld
    <script type="text/javascript">

        function ExerciseChange(id) {
            $.post("{{route('ApiBlipdExercise')}}?api_token={{Auth::user()->api_token}}", {
                exercise_id: "ecard" + id,
                state_id: "estate" + document.getElementById(id + 'exercise-select').value,
            }, function (data) {
                console.log(data);
            });
        }

        function LessonChange(id) {
            $.post("{{route('ApiBlipdLesson')}}?api_token={{Auth::user()->api_token}}", {
                lesson_id: "lcard" + id,
                state_id: "lstate" + document.getElementById(id + 'lesson-select').value,
            }, function (data) {
                console.log(data);
            });
        }
    </script>
    @endhandheld
@endsection
@endif
