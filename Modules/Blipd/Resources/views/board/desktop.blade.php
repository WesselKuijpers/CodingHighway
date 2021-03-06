{{-- Blipd desktop page --}}
<div class="row mt-3 mr-3">
    <div class="col-12 text-right">
        <a href="{{route('planning.create')}}" class="btn btn-primary btn-organisation">Maak een planning</a>
    </div>
</div>
<div class="row card dashboard-card mt-2">
    @if(!empty($planning))
    <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th scope="col-3"></th>
            @foreach($states as $state)
                <th scope="col-3" class="blipd-table-head">{{$state->name}}</th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        @if($planning->lessons->count() != 0)
        <tr id="lessonBoard">
            <th scope="row" class="blipd-table-left">Lessen</th>
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
        @endif
        @if($planning->exercises->count() != 0)
        <tr id="exerciseBoard">
            <th scope="row" class="blipd-table-left">Opdrachten</th>
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
        @endif
        </tbody>
    </table>
        @else
    <div class="col-12 text-center">
        <p>Geen planning gevonden, <a href="{{route('planning.create')}}">maak er één aan.</a></p>
    </div>
        @endif
</div>
