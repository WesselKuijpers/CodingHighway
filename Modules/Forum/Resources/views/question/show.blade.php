@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card {{ ($question->solved) ? 'solved' : null  }}">
        <div class="card-header">
          <strong>Vraag: </strong>{{ $question->title }}
        </div>
        <div class="card-body">
          {!! $question->content !!}
        </div>
        <div class="card-footer">
          <form class="d-inline"
                action="{{ route('QuestionSolve', ['topic' => $question->topic->slug, 'question' => $question->slug]) }}"
                method="post">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <input type="submit" value="Sluit vraag" class="btn btn-success btn-organisation">
          </form>&emsp;
          <strong>Door: </strong>{{ $question->user->getFullName() }}&emsp;
          @if(!empty($topic->course))
            <strong>Cursus: </strong>{{ $topic->course->name }}&emsp;
          @endif
          @if(!empty($question->lesson))
            <strong>Les: </strong>{{ $question->lesson->title }}&emsp;
          @endif
          @if(!empty($question->exercise))
            <strong>Oefening: </strong>{{ $question->exercise->title }}&emsp;
          @endif
        </div>
      </div>
    </div>
    @foreach($question->answers as $answer)
      <div class="offset-1 col-11">
        <div class="card answer-card">
          <div class="card-body">
            @if($answer->is_best)
              <div class="row">
                <div class="col-2">
                  <img src="{{ asset('storage/img/check.png') }}" alt="check" class="is_best">
                </div>
                <div class="col-10">
                  @endif
                  {!! $answer->content !!}
                  @if($answer->is_best)
                </div>
              </div>
            @endif

          </div>
          <div class="card-footer">
            <form action="{{ route('BestAnswer', ['topic' => $question->topic->slug]) }}"
                  class="d-inline"
                  method="post">
              @csrf
              <input type="hidden" name="answer_id" value="{{ $answer->id }}">
              <input type="submit" class="btn btn-success btn-organisation" value="Beste antwoord"/>&emsp;
            </form>
            <strong>Door: </strong>{{ $answer->user->getFullName() }}&emsp;
          </div>
        </div>
      </div>
    @endforeach
    @auth
      <div class="offset-1 col-11 answer-card">
        <form action="{{ route('AnswerSave', ['topic' => $question->topic->slug, 'question' => $question->slug]) }}"
              method="post">
          @csrf
          <input type="hidden" name="user_id" value="{{ Auth::id() }}">
          <input type="hidden" name="question_id" value="{{ $question->id}}">
          <div class="input-group form-group">
            <textarea name="content" id="content" cols="30" rows="10" class="textarea"></textarea>
          </div>
          <div class="input-group form-group">
            <input type="submit" id="submit" name="submit" class="btn btn-primary btn-organisation">
          </div>
        </form>
      </div>
    @endauth
  </div>
@endsection