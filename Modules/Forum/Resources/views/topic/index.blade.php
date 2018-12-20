@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1><strong>TOPIC:</strong> {{ $topic->name }}</h1>
      @if (!empty($topic->course_id))
        <hr>
        <h3><strong>Cursus: </strong>{{ $topic->course->name }}</h3>
      @endif
    </div>
    <div class="col-12">
      @auth
        <a class="btn btn-primary btn-organisation" href="{{ route('QuestionCreate', ['topic'=>$topic->slug]) }}">
          Maak een nieuwe vraag
        </a>
      @endauth
      @foreach($questions as $question)
        <a href="{{ route('QuestionShow', ['topic' => $topic->slug, 'question' => $question->slug]) }}"
           class="list-group-item list-group-item-action">
          {{ $question->title }}
          <span class="float-right">
            Antwoorden bij deze vraag:
            {{ $question->answers->count() }}
          </span>

          <span class="float-right" id="userQuestion">
            Aangemaakt door:
            {{ $question->user->getFullName() }}
          </span>
        </a>
      @endforeach
    </div>
  </div>
@endsection