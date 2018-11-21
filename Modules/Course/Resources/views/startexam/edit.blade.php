{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <h1>Pas de starttoets voor {{$startExam->course->name}} aan:</h1>
  <form method="POST" action="{{route('startExam.update', ['course_id' => $startExam->course->id, 'id' => $startExam->id])}}">
    @csrf
    @method('PUT')
    <input type="hidden" value={{$startExam->course->id}} name="course_id">
    <input type="hidden" value={{$startExam->id}} name="id">
    @foreach ($startExam->questions as $question)
      <div class="row">
        <div class="col-1">
          <p>
            <strong>Vraag:</strong>
          </p>
        </div>
        <div class="col-9">
          @include('shared.form_required', ['label' => 'Vraag', 'name'=> 'questions['.$question->id.'][content]', 'type'=> 'text',
            'value' => $question->content, 'class' => 'form-control'])
        </div>
      </div>
      @foreach ($question->answers as $answer)
        @if($answer->id == $question->correct_answer_id)
          <div class="row">
            <div class="col-2 offset-1">
              <p>
                <strong>Correct antwoord:</strong>
              </p>
            </div>
            <div class="col-7">
              @include('shared.form_required', ['label' => 'Vraag', 'name'=> 'questions['.$question->id.'][correct]['.$answer->id.']', 'type'=> 'text',
                'value' => $answer->content, 'class' => 'form-control'])
            </div>
          </div>
        @else
          <div class="row">
            <div class="col-2 offset-1">
              <p>
                <strong>Incorrect antwoord:</strong>
              </p>
            </div>
            <div class="col-7">
              @include('shared.form_required', ['label' => 'Vraag', 'name'=> 'questions['.$question->id.'][inCorrect]['.$answer->id.']', 'type'=> 'text',
                'value' => $answer->content, 'class' => 'form-control'])
            </div>
          </div>
        @endif
      @endforeach
      <hr>
    @endforeach
    <input type="submit" class="btn btn-primary btn-organisation" value="opslaan">
  </form>
@endsection