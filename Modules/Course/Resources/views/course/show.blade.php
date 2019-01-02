{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
    <div class="row">
        @if($startResult->count() != 1 && !Auth::user()->hasPermission('course.create'))
            {{--TODO render exam--}}
            <div class="row">
                <div class="col-12 ml-2 startexam" data-course_id="{{ $course->id }}"
                     data-api="{{Auth::user()->api_token}}"/>
            </div>

        @else

        @if(Auth::check() && Auth::user()->hasPermission('group.create'))
            <div class="col-8">
        @else
            <div class="col-12 ml-2">
        @endif
                <div class="row">
                    <div class="col-12">
                        <h1>{{$course->name}}</h1>
                    </div>
                </div>

                @permission('course.create')
                @if($course->startExam == null)
                    <div class="row">
                        <div class="col-12 ml-2">
                            <a href="{{ route('startExam.create', ['course_id' => $course->id]) }}"
                               class="btn btn-danger mt-3 mb-3">Maak
                                eerst een
                                starttoets aan!</a>
                        </div>
                    </div>

                @else
                    <div class="row">
                        <a href="{{ route('startExam.show', ['course_id' => $course->id, 'id' => $course->startExam->id]) }}"
                        class="btn btn-primary btn-organisation">Bekijk de starttoets</a>
                    </div>
                    <div class="offset-1">
                        <form method="POST"
                              action="{{route('startExam.destroy', ['course_id' => $course->id, 'id' => $course->startExam->id])}}">
                            @method('DELETE')
                            @csrf
                            <div class="row">
                                <div class="col-12 ml-2">
                                    <input type="hidden" value={{$course->startExam->id}} name="id">
                                    <input type="submit" value="Verwijderen" class="btn btn-danger">
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
                @endpermission

                <div class="row">
                    <div class="col-12">
                        <p>{!! $course->description !!}</p>
                    </div>
                </div>

                @if(count(Auth::user()->progress($course->id)->latest('id')->get()) != 0)
                    <form action="{{ route('progress.reset') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-12 ml-2">
                                <input type="hidden" value="{{ Auth::id() }}" name="user_id"/>
                                <input type="hidden" value="{{ $course->id }}" name="course_id"/>
                                <input type="submit" class="btn btn-danger" value="Voortgang terugzetten"/>
                            </div>
                        </div>
                    </form>
                @endif

                <div class="col-12 ml-2">
                    <h3 class="mt-3">Lessen</h3>
                </div>
                @permission('lesson.create')
                @if($course->startExam != null)
                    <a href="{{ route('lesson.create', ['course_id'=>$course->id]) }}"
                       class="btn btn-primary btn-organisation">Maak
                        een les</a>
                @else
                    <div class="row">
                        <div class="col-12 ml-3">
                            <p>Maak eerst een starttoets aan!</p>
                        </div>
                    </div>
                @endif
                @endpermission
                @if(count($lessons) == 0)
                    <div class="col-12 ml-2">
                        <p>Geen lessen voor deze cursus gevonden</p>
                    </div>
                @else
                    <div
                            class="progressbar col-11 ml-3"
                            data-user_id="{{ Auth::id() }}"
                            data-course_id="{{ $course->id }}"
                            data-lessons="1"
                            data-token="{{ Auth::user()->api_token }}"
                    >
                    </div>
                    <div class="row col-12">
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

                        <div class="row">
                            <div class="col-12 ml-2">
                                <h3 class="mt-3">Opdrachten</h3>
                            </div>
                            @permission('exercise.create')
                            @if($course->startExam != null)
                                <a href="{{ route('exercise.create', ['course_id'=>$course->id]) }}"
                                   class="btn btn-primary btn-organisation">Maak
                                    een opdracht</a>
                            @else
                                <div class="row">
                                    <div class="col-12 ml-3">
                                        <p>Maak eerst een starttoets aan!</p>
                                    </div>
                                </div>

                            @endif
                        </div>
                        @endpermission
                        @if(count($exercises) == 0)
                            <div class="row">
                                <div class="col-12 m-2">
                                    <p>Geen opdrachten voor deze cursus gevonden</p>
                                </div>
                            </div>
                        @else
                            <div
                                    class="progressbar col-11 ml-3"
                                    data-user_id="{{ Auth::id() }}"
                                    data-course_id="{{ $course->id }}"
                                    data-exercises="1"
                                    data-token="{{ Auth::user()->api_token }}"
                            >
                            </div>
                            <div class="row col-12">
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
            </div>
            @permission('group.create')
                <div class="col-4">
                    @if(Auth::user()->organisation()->groups->count() != 0)
                        @if(Auth::user()->organisation()->groups->where('course_id', $course->id)->count() != 0)
                            <h3>Bestaande groepen:</h3>
                            <hr>
                            @foreach (Auth::user()->organisation()->groups->where('course_id', $course->id) as $group)
                                <strong>Docent: </strong>{{$group->teacher->getFullname()}}
                                <br>
                                <strong>Studenten: </strong>
                                <ul>
                                    @foreach($group->students as $student)
                                        <li>{{$student->getFullname()}} @if($student->results->where('course_id', $course->id)->count() != 0) || {{$student->results->where('course_id', $course->id)->first()->level->name}} @endif</li>
                                    @endforeach
                                </ul>
                                <hr>
                            @endforeach
                        @endif
                    @endif
                    <h3>Studenten zonder groep:</h3>
                    <form method="POST" action="{{route('group.store')}}">
                        @csrf
                        <input type="hidden" name="organisation" value="{{Auth::user()->organisation()->id}}">
                        <input type="hidden" name="course" value="{{$course->id}}">
                        <ul>
                            @foreach(Auth::user()->organisation()->users as $student)
                                @if($student->groups->where('course_id', $course->id)->count() == 0 && $student->id != Auth::id() && !$student->hasRole('teacher'))
                                    <li>
                                        <input type="checkbox" name="users[]" id="check{{$student->id}}" value="{{$student->id}}">
                                        <label for="check{{$student->id}}">
                                            {{$student->getFullname()}} 
                                            @if($student->results->where('course_id', $course->id)->count() != 0)
                                                || {{$student->results->where('course_id', $course->id)->first()->level->name}} 
                                            @endif
                                        </label>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <strong>Docent:</strong>
                        <select name="teacher">
                            @foreach (Auth::user()->organisation()->users as $user)
                                @if($user->hasRole('teacher'))
                                    <option value="{{$user->id}}">{{$user->getFullname()}}</option>
                                @endif
                            @endforeach
                        </select>
                        <br>
                        <br>
                        <input type="submit" value="Opslaan" class="btn btn-primary btn-organisation">
                    </form>
                </div>
            @endpermission
        </div>
@endsection