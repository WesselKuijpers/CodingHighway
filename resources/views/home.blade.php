@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header organisation-card-header text-center">Het dashboard van
            {{ Auth::user()->getFullname()}}
          </div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
            @if(Auth::user()->plannings->count() != 0)
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <h1 class="text-center">Huidige sprint:</h1>
                  <canvas id="pie-chart"></canvas>
                  <p class="text-center"><strong>Loopt af op: </strong>{{\Carbon\Carbon::parse(Auth::user()->plannings()->latest('id')->first()->finished, 'UTC')->format('d F Y')}}</p>
                </div>
                <div class="col-sm-12 col-md-6">
                  <h1 class="text-center">laatste 
                    <select name="limit" onchange="calculateBar({{Auth::id()}}, this.value)">
                      @for($i = 2; $i < Auth::user()->plannings->count(); $i++)
                        <option value={{$i}}>{{$i}}</option>
                      @endfor
                    </select> sprints:</h1>
                  <canvas id="pie-chart-2"></canvas>
                </div>
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
                  <div class="offset-3 col-6">
                    <a href="{{url('user/edit')}}">
                      <input type="submit" class="btn btn-organisation" value="Gegevens aanpassen">
                    </a>
                  </div>
                </div>
                @if(Auth::user()->license->count() == 1)
                  <p class="font-weight-bold mt-3">Licentie</p>
                  <div class="row">
                    <div class="col-3">
                      <p>Soort:</p>
                    </div>
                    <div class="col-7">
                      <p>@if(!empty(Auth::user()->license()->first()->organisation_id))Organisatie @else
                          Persoonlijk @endif</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <p>Geldig tot:</p>
                    </div>
                    <div class="col-7">
                      @if(Auth::user()->license->count() == 1)
                        <p>{{ \Carbon\Carbon::parse(Auth::user()->license->first()->expires_at, 'UTC')->format('d F Y')}}</p>
                      @else
                        <p> - </p>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <p>Code:</p>
                    </div>
                    <div class="col-6">
                      @if(Auth::user()->license->count() == 1)
                        <p>{{ Auth::user()->license->first()->key }}</p>
                      @endif
                    </div>
                  </div>
                @endif
                <p class="font-weight-bold mt-3">Organisatie</p>
                @if(!empty(Auth::user()->organisation()) && Auth::user()->organisation()->active != 0)

                  <div class="row">
                    <div class="col-3">
                      <p>Naam</p>
                    </div>
                    <div class="col-6">
                      <p>{{Auth::user()->organisation()->name}}</p>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-3">
                      <p>E-mail</p>
                    </div>
                    <div class="col-6">
                      <p>{{Auth::user()->organisation()->email}}</p>
                    </div>
                  </div>

                  @if(!empty(Auth::user()->organisation()->phone))
                    <div class="row">
                      <div class="col-3">
                        <p>Nummer</p>
                      </div>
                      <div class="col-6">
                        <p>{{Auth::user()->organisation()->phone}}</p>
                      </div>
                    </div>
                  @endif

                @else
                  <p>Je maakt nog geen deel uit van een organisatie</p>
                @endif
              </div>

              <div class="col-md-7 col-sm-12">
                @foreach($courses as $course)
                  @if(App\UserProgress::where('user_id', Auth::id())->where('course_id', $course->id)->count() != 0)
                    <p class="font-weight-bold mt-3">Voortgang van de {{ $course->name }} cursus</p>

                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="card custom-card mb-4 course-card">
                          <img class="card-img-top img-fluid custom-img"
                               src="@if (!empty($course->media->content)) {{ $course->media->content }} @else {{asset("storage/img/logo/placeholder.png")}} @endif"
                               alt="Afbeelding niet gevonden">
                          <div class="card-body">
                            <h2 class="text-center text-color">Opdrachten</h2>
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

                              <a
                                href="{{ route('exercise.show', ['course_id' => $course->id, 'id' => Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->first()->exercise->next->id]) }}"
                                class="no-link btn btn-outline-dark">Ga verder</a>
                            @elseif (count(Auth::user()->progress($course->id)->where('exercise_id', '!=', null)->latest('id')->get()) != 0)
                              <p>Je hebt deze opdrachten al afgerond</p>
                              <a href="{{ route('course.show', ['id' => $course->id]) }}"
                                 class="no-link btn btn-outline-dark">Bekijk</a>
                            @else
                              <p>Je bent nog niet begonnen aan deze opdrachten</p>
                              <a href="{{ route('course.show', ['id' => $course->id]) }}"
                                 class="no-link btn btn-outline-dark">Start</a>
                            @endif
                          </div>
                        </div>
                      </div>

                      <div class="col-sm-12 col-md-12 col-lg-6">
                        <div class="card custom-card mb-4 course-card">
                          <img class="card-img-top img-fluid custom-img"
                               src="@if (!empty($course->media->content)) {{ $course->media->content }} @else {{asset("storage/img/logo/placeholder.png")}} @endif"
                               alt="Afbeelding niet gevonden">
                          <div class="card-body">
                            <h2 class="text-center text-color">Lessen</h2>
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

                              <a
                                href="{{ route('lesson.show', ['course_id' => $course->id, 'id' => Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->first()->lesson->next->id]) }}"
                                class="no-link btn btn-outline-dark">Ga verder</a>
                            @elseif (count(Auth::user()->progress($course->id)->where('lesson_id', '!=', null)->latest('id')->get()) != 0)
                              <p>Je hebt deze lessen al afgerond</p>
                              <a href="{{ route('course.show', ['id' => $course->id]) }}"
                                 class="no-link btn btn-outline-dark">Bekijk</a>
                            @else
                              <p>Je bent nog niet begonnen aan deze lessen</p>
                              <a href="{{ route('course.show', ['id' => $course->id]) }}"
                                 class="no-link btn btn-outline-dark">Start</a>
                            @endif
                          </div>
                        </div>

                      </div>
                      @endif
                      @endforeach
                    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
@section('scripts')
  <script>
    function calculatePie(id, planning_id) {
      $.post("{{route('ApiBlipdGetPie')}}?api_token={{Auth::user()->api_token}}", {user_id : id, planning_id : planning_id}, function(data){
        console.log(data);
        if(data.total != 0){
          let chart = document.getElementById('pie-chart');
          var ctxP = document.getElementById("pie-chart").getContext('2d');
          var myPieChart = new Chart(ctxP, {
            type: 'pie',
            data: {
              labels: ["Gehaald", "Gefaald", "Bezig", "Backlog"],
              datasets: [{
                data: [data.done, data.failed, data.in_progress, data.backlog],
                backgroundColor: ["#00FF21", "#FF0000", "#FFD800", "#0094FF"],
                hoverBackgroundColor: ["#00CC17", "#CC0000", "#CCAA00", "#007ED8"]
              }]
            },
            options: {
              responsive: true,
              legend: {
                position: 'bottom',
              },
              layout: {
                padding: {
                  left: 30,
                  right: 30,
                  top: 10,
                  bottom: 10,
                }
              }
            },
          });
        }
      });
    }

    function calculateBar(id, limit) {
      $.post("{{route('ApiBlipdGetBar')}}?api_token={{Auth::user()->api_token}}", {user_id : id, limit : limit}, function(data){
        console.log(data);
        if(data.total != 0){
          let chart = document.getElementById('pie-chart-2');
          var ctxP = document.getElementById("pie-chart-2").getContext('2d');
          let failed = [];
          let succeeded = [];
          let dates = [];

          for (i = 0; i < data.length; i++){
            x = i + 1;
            dates.push(x);
          };

          for (i = 0; i < data.length; i++){
            failed.push(data[i].failed);
          };

          for (i = 0; i < data.length; i++){
            succeeded.push(data[i].succeeded);
          };

          var myPieChart = new Chart(ctxP, {
            type: 'line',
            data: {
              labels: dates, 
              datasets: [{
                data: failed,
                borderColor: ["#FF0000"],
                label: "gefaald"
              },{
                data: succeeded,
                borderColor: ["#00FF21"],
                label: "gehaald",
              }]
            },
            options: {
              responsive: true,
              legend: {
                position: 'bottom',
              }
            },
          });
        }
      });
    }
  </script>
    @if(Auth::user()->plannings->count() != 0)
      <script>
        window.onload = calculatePie({{Auth::id()}}, {{Auth::user()->plannings()->latest('id')->first()->id}});
        window.onload = calculateBar({{Auth::id()}}, 2)
      </script>
    @endif
@endsection
