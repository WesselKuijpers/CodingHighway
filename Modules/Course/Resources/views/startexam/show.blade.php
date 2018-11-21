{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <h1>Overzicht van de {{$course->name}} starttoets:</h1>
  
  <div class="row">
      <div class="col-2">
          <a href="{{route('startExam.edit', ['course_id' => $course->id, 'id' => $course->startExam->id])}}" class="btn btn-primary btn-organisation">Pas de toets aan</a>
      </div>
      <div class="col-2">
        <form method="POST" action="{{route('startExam.destroy', ['course_id' => $course->id, 'id' => $course->startExam->id])}}">
          @method('DELETE')
          @csrf
          <input type="hidden" value={{$course->startExam->id}} name="id">
          <input type="submit" value="Verwijderen" class="btn btn-danger">
        </form>
      </div>
      <br>
    </div>
  <br>
  <h3>Vragen:</h3>
  @foreach($course->startExam->questions as $question)
    <h4>{{$question->content}}</h4>
    <strong>Antwoorden:</strong>
    @foreach($question->answers as $answer)
      <div class={{ $answer->id == $question->correct_answer_id ? "bg-success" : "bg-danger" }}>
        {{ $answer->content }}
      </div>
    @endforeach
    <hr>
  @endforeach
@endsection