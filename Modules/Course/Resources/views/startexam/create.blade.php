{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <h1 class="text-center">Maak de starttoets voor de cursus {{ $course->name }}</h1>
  <div clas="row">
    <p class="col-3">Aantal vragen:</p>
    <select id="questionNum" class="form-control" onchange="changeFields(this)">
      <option value="0">-- HOEVEELHEID --</option>
      @for($x = 10; $x <= 30; $x++)
        <option value="{{$x}}">{{$x}}</option>
      @endfor
    </select>
  </div>
  <hr>
  <form method="POST" action="{{ route('startExam.store', ['course_id' => $course->id]) }}">
    <input type="hidden" name="course_id" value={{ $course->id }}>
    @csrf
    <div id="formContent">
      
    </div>
    <input type="submit" class="btn btn-primary btn-organisation" value="opslaan">
  </form>
  <script>
    function changeFields(selected){
      var num = selected.value;
      var formContent = document.getElementById('formContent');

      while (formContent.hasChildNodes()) {
        formContent.removeChild(formContent.lastChild);
      }

      for(x = 1; x <= num; x++){
        var title = document.createElement("H3");
        var titleContent = document.createTextNode("vraag " + x + ":");
        title.appendChild(titleContent);
        formContent.appendChild(title);

        var question = document.createElement("input");
        question.type = "text";
        question.name = "questions[" + x + "][content]";
        question.className = "form-control";
        question.placeholder = "vraag";

        formContent.appendChild(question);

        formContent.appendChild(document.createElement("br"));
        
        var subTitle = document.createElement("strong");
        var subTitleContent = document.createTextNode("Antwoorden:");
        subTitle.appendChild(subTitleContent);
        formContent.appendChild(subTitle);

        var answers = document.createElement("div");
        var a1 = document.createElement("input");
        a1.type = "text";
        a1.placeholder = "Correct antwoord";
        a1.name = "questions[" + x + "][correct]";
        a1.className = "form-control";
        answers.appendChild(a1);

        answers.appendChild(document.createElement("br"));
        
        var a2 = document.createElement("input");
        a2.type = "text";
        a2.placeholder = "Incorrect antwoord";
        a2.name = "questions[" + x + "][inCorrect][]";
        a2.className = "form-control";
        answers.appendChild(a2);

        answers.appendChild(document.createElement("br"));
        
        var a3 = document.createElement("input");
        a3.type = "text";
        a3.placeholder = "Incorrect antwoord";
        a3.name = "questions[" + x + "][inCorrect][]";
        a3.className = "form-control";
        answers.appendChild(a3);

        answers.appendChild(document.createElement("br"));
        
        var a4 = document.createElement("input");
        a4.type = "text";
        a4.placeholder = "Incorrect antwoord";
        a4.name = "questions[" + x + "][inCorrect][]";
        a4.className = "form-control";
        answers.appendChild(a4);

        answers.appendChild(document.createElement("br"));

        formContent.appendChild(answers);

        formContent.appendChild(document.createElement("br"));
      }
    }
  </script>
@endsection
