@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header text-center">Het dashboard van
            {{ Auth::user()->getFullname()}}
          </div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            <div class="row">
              <div class="col-md-5 col-sm-12">
                <p class="font-weight-bold mt-3">Algemene informatie</p>
                <div class="row">
                  <div class="col-3">
                    <p>Naam:</p>
                  </div>
                  <div class="col-7">
                    <p>{{ Auth::user()->getFullname()}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <p>Email:</p>
                  </div>
                  <div class="col-7">
                    <p>{{ Auth::user()->email }}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <p>Organisatie:</p>
                  </div>
                  <div class="col-7">
                    <p>{{-- Auth::user()->organisation --}}</p>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <p>Licentiecode:</p>
                  </div>
                  <div class="col-6">
                    @if(Auth::user()->license->count() == 1)
                      <p>{{ Auth::user()->license->first()->key }}</p>
                    @endif
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <p>Geldig tot:</p>
                  </div>
                  <div class="col-6">
                    @if(Auth::user()->license->count() == 1)
                      <p>{{ \Carbon\Carbon::parse(Auth::user()->license->first()->expires_at, 'UTC')->format('d F Y')}}</p>
                    @endif

                  </div>
                  <div class="col-4">
                    <a href="{{url('user/edit')}}">
                      <input type="submit" class="btn btn-primary" value="Gegevens aanpassen">
                    </a>
                  </div>
                </div>
              </div>
 
              <div class="col-md-7 col-sm-12">
                @foreach($courses as $course)
                  <p class="font-weight-bold mt-3">Voortgang van de {{ $course->name }} cursus</p>
                  <div class="row">
                  <div
                    class="col-xl-5 col-lg-5 col-md-5 col-sm-12 project wow animated animated3 fadeInLeft custom-card mb-3"
                    @if (!empty($course->media->content))
                      style="background-image: url({{ $course->media->content }}) !important"
                    @endif
                    >
                    <div class="project-hover">
                      <h2>Opdrachten</h2>
                      <hr/>
                      @if (!empty(Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->first()->exercise->next))
                        <p>{{ Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->first()->exercise->next->title }}</p>
                      
                        <div
                          class="progressbar"
                          data-user_id="{{ Auth::id() }}"
                          data-course_id="{{ $course->id }}"
                          data-exercises="1"
                          data-token="{{ Auth::user()->api_token }}"
                        >
                        </div>

                      <a href="{{ route('exercise.show', ['course_id' => $course->id, 'id' => Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->first()->exercise->next->id]) }}">Ga verder</a>
                      @elseif (count(Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->get()) != 0)
                        <p>Je hebt deze opdrachten al afgerond</p>
                        <a href="{{ route('course.show', ['id' => $course->id]) }}">Bekijk</a>
                      @else
                        <p>Je bent nog niet begonnen aan deze opdrachten</p>
                        <a href="{{ route('course.show', ['id' => $course->id]) }}">Start</a>
                      @endif
                    </div>
                  </div>
                  <div
                    class="offset-md-1 offset-lg-1 offset-xl-1 col-xl-5 col-lg-5 col-md-5 col-sm-12 project wow animated animated3 fadeInLeft custom-card mb-3"
                    @if (!empty($course->media->content))
                      style="background-image: url({{ $course->media->content }}) !important"
                    @endif
                    >
                    <div class="project-hover">
                      <h2>Lessen</h2>
                      <hr/>
                      @if (!empty(Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->first()->lesson->next))
                        <p>{{ Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->first()->lesson->next->title }}</p>
                      
                        <div
                          class="progressbar"
                          data-user_id="{{ Auth::id() }}"
                          data-course_id="{{ $course->id }}"
                          data-lessons="1"
                          data-token="{{ Auth::user()->api_token }}"
                        >
                        </div>
                        
                      <a href="{{ route('lesson.show', ['course_id' => $course->id, 'id' => Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->first()->lesson->next->id]) }}">Ga verder</a>
                      @elseif (count(Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->get()) != 0)
                        <p>Je hebt deze lessen al afgerond</p>
                        <a href="{{ route('course.show', ['id' => $course->id]) }}">Bekijk</a>
                      @else
                        <p>Je bent nog niet begonnen aan deze lessen</p>
                        <a href="{{ route('course.show', ['id' => $course->id]) }}">Start</a>
                      @endif
                    </div>
                  </div>

                </div>
              @endforeach
            </div>


              {{-- <div class="col-md-7 offset-xl-5 offset-md-5 offset-lg-5 col-sm-12 offset-sm-0">
                <p class="font-weight-bold mt-3">Voortgang van de opdrachten</p>
                <div class="row">
                  <div
                    class="col-xl-5 col-lg-5 col-md-5 col-sm-12 project wow animated animated3 fadeInLeft custom-card mb-3">
                    <div class="project-hover">
                      <h2>HTML</h2>
                      <hr/>
                      <p>Opdracht 8 - Maak een Html tag</p>
                      <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100">8 / 20
                        </div>
                      </div>
                      <a href="#">Ga verder</a>
                    </div>
                  </div>
                  <div
                    class="offset-md-1 offset-lg-1 offset-xl-1 col-xl-5 col-lg-5 col-md-5 col-sm-12 project wow animated animated3 fadeInLeft custom-card mb-3">
                    <div class="project-hover">
                      <h2>CSS</h2>
                      <hr/>
                      <p>Opdracht 2 - Maak een Html tag</p>
                      <div class="progress mb-2">
                        <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100">75%
                        </div>
                      </div>
                      <a href="#">Ga verder</a>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
