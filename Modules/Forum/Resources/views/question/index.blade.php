@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1><strong>TOPIC:</strong> {{ $topic->name }}</h1>
    </div>
    <div class="col-12">
      @foreach($questions as $question)
        <a href="#" class="list-group-item list-group-item-action">
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