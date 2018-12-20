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
    <div class="col-12"></div>
  </div>
@endsection