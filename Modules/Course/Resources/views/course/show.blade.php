{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
    @if($startResult->count() != 1 && !Auth::user()->hasPermission('course.create'))
        {{--TODO render exam--}}
        <div class="col-12 startexam" data-course_id="{{ $course->id }}" data-api="{{Auth::user()->api_token}}"/>
    @else
        <div class="col-12">
            <h1>{{$course->name}}</h1>
            @permission('course.create')
            @if($course->startExam == null)
                <a href="{{ route('startExam.create', ['course_id' => $course->id]) }}" class="btn btn-danger">Maak
                    eerst een
                    starttoets aan!</a>
            @else
                <div class="row">
                    <div class="ml-3  mb-2">
                        <a href="{{ route('startExam.show', ['course_id' => $course->id, 'id' => $course->startExam->id]) }}"
                           class="btn btn-primary btn-organisation">Bekijk de starttoets</a>
                    </div>
                    <div class="offset-1">
                        <form method="POST"
                              action="{{route('startExam.destroy', ['course_id' => $course->id, 'id' => $course->startExam->id])}}">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" value={{$course->startExam->id}} name="id">
                            <input type="submit" value="Verwijderen" class="btn btn-danger">
                        </form>
                    </div>
                </div>
            @endif
            @endpermission
            <p>{!! $course->description !!}</p>
            @if(count(Auth::user()->progress($course->id)->latest('id')->get()) != 0)
                <form action="{{ route('progress.reset') }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ Auth::id() }}" name="user_id"/>
                    <input type="hidden" value="{{ $course->id }}" name="course_id"/>
                    <input type="submit" class="btn btn-danger" value="Voortgang terugzetten"/>
                </form>
            @endif
            <h3>Lessen</h3>
            @permission('lesson.create')
            @if($course->startExam != null)
                <a href="{{ route('lesson.create', ['course_id'=>$course->id]) }}"
                   class="btn btn-primary btn-organisation">Maak
                    een les</a>
            @else
                <p>Maak eerst een starttoets aan!</p>
            @endif
            @endpermission
            @if(count($lessons) == 0)
                <p>Geen lessen voor deze cursus gevonden</p>
            @else
                <div
                        class="progressbar"
                        data-user_id="{{ Auth::id() }}"
                        data-course_id="{{ $course->id }}"
                        data-lessons="1"
                        data-token="{{ Auth::user()->api_token }}"
                >
                </div>
                <div class="row">
                    @foreach($lessons as $lesson)
                        @if($startResult->count() == 1)
                            @if($startResult->first()->level->degree <= $lesson->level->degree)
                                <div class="card col-lg-2 col-md-3 col-sm-5 col-xs-12 list-card no-link text-center"
                                     onclick="location.href='{{ route('lesson.show',
                                    ['course_id' => $course->id, 'id'=> $lesson->id]) }}'"
                                     style="cursor: pointer;">
                                    <li class="card-body list-group">
                                        {{$lesson->title}}
                                    </li>
                                </div>
                            @endif
                        @else
                            <div class="card col-lg-2 col-md-3 col-sm-5 col-xs-12 list-card no-link text-center"
                                 onclick="location.href='{{ route('lesson.show',
                                 ['course_id' => $course->id, 'id'=> $lesson->id]) }}'"
                                 style="cursor: pointer;">
                                <li class="card-body list-group">
                                    {{$lesson->title}}
                                </li>
                            </div>
                        @endif
                    @endforeach
                    @endif
                </div>
                <h3>Opdrachten</h3>
                @permission('exercise.create')
                @if($course->startExam != null)
                    <a href="{{ route('exercise.create', ['course_id'=>$course->id]) }}"
                       class="btn btn-primary btn-organisation">Maak
                        een opdracht</a>
                @else
                    <p>Maak eerst een starttoets aan!</p>
                @endif
                @endpermission
                @if(count($exercises) == 0)
                    <p>Geen opdrachten voor deze cursus gevonden</p>
                @else
                    <div
                            class="progressbar"
                            data-user_id="{{ Auth::id() }}"
                            data-course_id="{{ $course->id }}"
                            data-exercises="1"
                            data-token="{{ Auth::user()->api_token }}"
                    >
                    </div>
                    <div class="row">
                        @foreach($exercises as $exercise)
                            <div class="card col-lg-2 col-md-3 col-sm-5 col-xs-12 list-card no-link text-center"
                                 onclick="location.href='{{ route('exercise.show',
                                ['course_id' => $course->id, 'id'=> $exercise->id]) }}'"
                                 style="cursor: pointer;">
                                <li class="card-body list-group">
                                    {{$exercise->title}}
                                    @if($exercise->solutions->where('user_id', Auth::id())->count() != 0)
                                        @if($exercise->solutions->where('user_id', Auth::id())->first()->reviews->count() > 0)
                                            @if($exercise->solutions->where('user_id', Auth::id())->first()->reviews->sortByDesc('created_at')->first()->rating == -1)
                      <span class="fa fa-times"></span>
                    @elseif($exercise->solutions->where('user_id', Auth::id())->first()->reviews->sortByDesc('created_at')->first()->rating == 1)
                      <span class="fa fa-check"></span>
                    @endif
                                        @endif
                                    @endif
                                </li>
                            </div>
                        @endforeach
                    </div>
                @endif
        </div>@endif
@endsection