{{-- Page to view the students planning --}}

{{-- Extending the layout --}}
@extends('blipd::layouts.master')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row">
    <div class="col-12 text-center">
      <h1>Overzicht van de planningen van studenten</h1>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="offset-2 col-2">
      <ul>
        @if(!empty($students))
          @foreach($students as $student)
            {{-- @unless($student->id == Auth::id()) --}}
              <li><a href="#" onclick="focusStudent({{$student->id}}, '{{$student->getFullname()}}')">{{$student->getFullname()}}</a></li>
            {{-- @endunless --}}
          @endforeach
        @endif
      </ul>
    </div>
    <div class="col-6">
        <div class="card" id="planning-card">
          <div class="card-header text-center d-none" id="planning-card-header">

          </div>
          <div class="card-body text-center" id="planning-card-body">
            <div id="card-select">
              <p>Geen student geselecteerd.</p>
            </div>
            <div id="card-content">

            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
@section('scripts')
  <script>
    function focusStudent(id, fullName) {
      $.post("{{route('ApiBlipdGetPlanning')}}?api_token={{Auth::user()->api_token}}", {user_id : id}, function(data){
        let card = document.getElementById('planning-card');
        let cardHeader = document.getElementById('planning-card-header');
        let cardBody = document.getElementById('card-select');
        let cardContent = document.getElementById('card-content');

        cardHeader.classList.remove('d-none');
        cardHeader.innerHTML = fullName;

        cardContent.innerHTML = "";

        if(data.length != 0){
          cardBody.innerHTML = "<h3>Planningen</h3>";
          let select = document.createElement("select");
          select.id = "planning-select";
          select.onchange = function(){changeContent(data)};
          for(i = 0; i < data.length; i++){
            let option = document.createElement("option");
            option.value = i;
            option.text = data[i].created_at+" - "+data[i].finished
            select.appendChild(option);
          }
          cardBody.appendChild(select);
          changeContent(data);
        } else {
          cardBody.innerHTML = "Deze student heeft nog geen planningen!";
        }
      })
    }

    function changeContent(data){
      let card = document.getElementById('planning-card');
      let cardHeader = document.getElementById('planning-card-header');
      let cardBody = document.getElementById('planning-card-body');
      const value = document.getElementById('planning-select').value;
      const current = data[value];

      let existingContent = document.getElementById("card-content");
      existingContent.innerHTML = "";

      let content = document.getElementById("card-content");
      // content.id = "card-content";
      
      if(current.lessons.length != 0){
        let lessons = document.createElement("div");
        let title = document.createElement("h4");
        let hr = document.createElement("hr");
        let br = document.createElement("br");
        lessons.appendChild(br);
        lessons.appendChild(br);
        title.innerHTML = "Lessen:";
        lessons.appendChild(title);
        lessons.appendChild(hr);

        for(i = 0; i < current.lessons.length; i++){
          lesson = current.lessons[i];
          let lessonItem = document.createElement("div");
          let lessonTitle = document.createElement("p");
          lessonTitle.innerHTML = "<strong>"+lesson.lesson.title+"</strong>";
          let lessonState = document.createElement("p");
          lessonState.innerHTML = "<strong>Status: </strong>"+lesson.state.name;
          let hr = document.createElement("hr");

          lessonItem.appendChild(lessonTitle);
          lessonItem.appendChild(lessonState);

          if(lesson.reason != null){
            let reason = document.createElement("p");
            reason.innerHTML = "<strong>Reden voor falen: </strong>"+lesson.reason;
            lessonItem.appendChild(reason);
          } else if(lesson.state.name == "F") {
            let reason = document.createElement("p");
            reason.innerHTML = "Deze student heeft nog geen reden gegeven";
            lessonItem.appendChild(reason);
          }
          lessonItem.appendChild(hr);

          lessons.appendChild(lessonItem);
          content.appendChild(lessons);
        }

        cardBody.appendChild(content);
      } else {
        let nc = document.createElement("p");
        nc.innerHTML = "Geen lessen gedaan"
        content.appendChild(nc);
      }

      if(current.exercises.length != 0){
        let exercises = document.createElement("div");
        let title = document.createElement("h4");
        let hr = document.createElement("hr");
        let br = document.createElement("br");
        exercises.appendChild(br);
        exercises.appendChild(br);
        title.innerHTML = "Opdrachten:";
        exercises.appendChild(title);
        exercises.appendChild(hr);

        for(i = 0; i < current.exercises.length; i++){
          exercise = current.exercises[i];
          let exerciseItem = document.createElement("div");
          let exerciseTitle = document.createElement("p");
          exerciseTitle.innerHTML = "<strong>"+exercise.exercise.title+"</strong>";
          let exerciseState = document.createElement("p");
          exerciseState.innerHTML = "<strong>Status: </strong>"+exercise.state.name;
          let hr = document.createElement("hr");

          exerciseItem.appendChild(exerciseTitle);
          exerciseItem.appendChild(exerciseState);

          if(exercise.reason != null){
            let reason = document.createElement("p");
            reason.innerHTML = "<strong>Reden voor falen: </strong>"+exercise.reason;
            exerciseItem.appendChild(reason);
          } else if(exercise.state.name == "F") {
            let reason = document.createElement("p");
            reason.innerHTML = "Deze student heeft nog geen reden gegeven";
            exerciseItem.appendChild(reason);
          }
          exerciseItem.appendChild(hr);

          exercises.appendChild(exerciseItem);
          content.appendChild(exercises);
        }

        cardBody.appendChild(content);
      } else {
        nc = document.createElement("p");
        nc.innerHTML = "Geen opdrachten gedaan";
        content.appendChild(nc);
      }
    }
  </script>
@endsection