{{-- Page to view the blipd board --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')
    @desktop
    <div class="row mt-3 mr-3">
        <div class="col-12 text-right">
            <a href="{{route('planning.create')}}" class="btn btn-primary btn-organisation">Maak een planning</a>
        </div>
    </div>
    <div class="row card dashboard-card mt-2 pt-3">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th scope="col"></th>
                @foreach($states as $state)
                    <th scope="col">{{$state->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            <tr id="lessonBoard">
                <th scope="row">Lessen</th>
                @foreach($states as $state)
                    <td id="lstate{{$state->id}}">
                        @foreach($planning->lessons->where('state_id', $state->id) as $lessonCard)
                            <div class="card blipd-card m-3" id="lcard{{$lessonCard->id}}" draggable="true">
                                <div class="card-body">
                                    <h3>
                                        <a href="{{route('lesson.show', ['course_id' => $lessonCard->lesson->course_id, 'id' => $lessonCard->lesson->id])}}">
                                            {{$lessonCard->lesson->title}}
                                        </a>
                                    </h3>
                                    <p>
                                        <a href="{{route('course.show', ['id' => $lessonCard->lesson->course_id])}}">
                                            {{$lessonCard->lesson->course->name}}
                                        </a>
                                    </p>
                                    <p>Punten: 5</p>
                                </div>
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
                                <div class="card-body">
                                    <h3>
                                        <a href="{{route('exercise.show', ['course_id' => $exerciseCard->exercise->course_id, 'id' => $exerciseCard->exercise->id])}}">
                                            {{$exerciseCard->exercise->title}}
                                        </a>
                                    </h3>
                                    <p>
                                        <a href="{{route('course.show', ['id' => $exerciseCard->exercise->course_id])}}">
                                            {{$exerciseCard->exercise->course->name}}
                                        </a>
                                    </p>
                                    <p>Punten: 5</p>
                                </div>
                            </div>
                        @endforeach
                    </td>
                @endforeach
            </tr>
            </tbody>
        </table>
    </div>
    @enddesktop

    @handheld
    <div class="col-12 pt-3">
        <h1 class="pt-2 text-center">Lessen</h1>
        <div class="offset-2 col-8">
            <hr>
        </div>
        @foreach($states as $state)
            <div id="lstate{{$state->id}}">
                @foreach($planning->lessons->where('state_id', $state->id) as $lessonCard)
                    <div class="card blipd-card m-3" id="lcard{{$lessonCard->id}}" draggable="true">
                        <div class="card-body">
                            <h3 class="blipd-title">
                                <a href="{{route('lesson.show', ['course_id' => $lessonCard->lesson->course_id, 'id' => $lessonCard->lesson->id])}}">
                                    {{$lessonCard->lesson->title}}
                                </a>
                            </h3>
                            <p class="pl-3">
                                <a href="{{route('course.show', ['id' => $lessonCard->lesson->course_id])}}">
                                    {{$lessonCard->lesson->course->name}}
                                </a>
                            </p>
                            <span class="blipd-points-badge bg-info text-white">5 punten</span>
                            @foreach($states as $state)
                                <button class="btn btn-danger btn-{{$lessonCard->id}}" onclick="BlipdUpdateLessonState({{$state->id}}, {{$lessonCard->id}})">{{$state->name}}</button>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach

        <h1 class="pt-2 text-center">Opdrachten</h1>
        <div class="offset-2 col-8">
            <hr>
        </div>
        @foreach($states as $state)
            <div id="estate{{$state->id}}">
                @foreach($planning->exercises->where('state_id', $state->id) as $exerciseCard)
                    <div class="card blipd-card m-3" id="ecard{{$exerciseCard->id}}" draggable="true">
                        <div class="card-body">
                            <h3 class="blipd-title">
                                <a href="{{route('exercise.show', ['course_id' => $exerciseCard->exercise->course_id, 'id' => $exerciseCard->exercise->id])}}">
                                    {{$exerciseCard->exercise->title}}
                                </a>
                            </h3>
                            <p class="ml-2">
                                <a href="{{route('course.show', ['id' => $exerciseCard->exercise->course_id])}}">
                                    {{$exerciseCard->exercise->course->name}}
                                </a>
                            </p>
                            <span class="blipd-points-badge bg-info text-white">5 punten</span>

                            @foreach($states as $state)
                                <button class="btn btn-danger btn-{{ $exerciseCard->id }}btn-danger" onclick="BlipdUpdateExerciseState({{$state->id}}, {{$exerciseCard->id}})">{{$state->name}}</button>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    @endhandheld
@endsection
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
            function BlipdUpdateExerciseState(state, id) {
                // Todo: color button green depending on state
                $.post("{{route('ApiBlipdExerciseMobile')}}?api_token={{Auth::user()->api_token}}", {
                    exercise_id: "ecard"+id,
                    state_id: "estate"+state
                }, function (data) {
                    console.log(data)
                })
            }
            function BlipdUpdateLessonState(state, id) {
                // Todo: color button green depending on state
                console.log($(this).removeClass('btn-danger').addClass('btn-success'));
                $.post("{{route('ApiBlipdLessonMobile')}}?api_token={{Auth::user()->api_token}}", {
                    lesson_id: "lcard"+id,
                    state_id: "lstate"+state,
                }, function (data) {
                    console.log(data)
                })
            }
        </script>
    @endhandheld
@endsection
