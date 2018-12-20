{{-- Blipd mobile and tablet page --}}
<div class="col-12 pt-3">
    <h1 class="pt-2 text-center">Lessen</h1>
    <div class="offset-2 col-8">
        <hr>
    </div>
    @foreach($states as $state)
        <div id="lstate{{$state->id}}">
            @foreach($planning->lessons->where('state_id', $state->id) as $lessonCard)
                <div class="card blipd-card-mobile m-3" id="lcard{{$lessonCard->id}}" draggable="true">
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
                        <select id="{{$lessonCard->id}}lesson-select" class="ml-2"
                                onchange="LessonChange({{$lessonCard->id}})">
                            @foreach($states as $state)
                                <option @if($state->id == $lessonCard->state->id) selected
                                        @endif value="{{$state->id}}">{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

    <h1 class="text-center">Opdrachten</h1>
    <div class="offset-2 col-8">
        <hr>
    </div>
    @foreach($states as $state)
        <div id="estate{{$state->id}}">
            @foreach($planning->exercises->where('state_id', $state->id) as $exerciseCard)
                <div class="card blipd-card-mobile m-3" id="ecard{{$exerciseCard->id}}" draggable="true">
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
                        <select id="{{$exerciseCard->id}}exercise-select" class="ml-2"
                                onchange="ExerciseChange({{$exerciseCard->id}})">
                            @foreach($states as $state)
                                <option value="{{$state->id}}"
                                        @if($state->id == $exerciseCard->state->id) selected @endif >{{$state->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>