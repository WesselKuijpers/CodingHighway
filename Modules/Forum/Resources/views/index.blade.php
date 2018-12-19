@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1>Forum</h1>
      <a class="btn btn-primary btn-organisation" href="{{ route('TopicCreate') }}">
        Maak een nieuwe Topic
      </a>
    </div>
    <div class="col-12">
      <div class="list-group">
        @foreach($topics as $topic)
          <a href="{{ route('TopicIndex', ['topic'=> $topic->slug]) }}" class="list-group-item list-group-item-action">
            {{ $topic->name }}
            <span class="float-right">
              Vragen in dit topic:
              {{ $topic->questions->count() }}
            </span>
          </a>
        @endforeach
      </div>
    </div>
  </div>
@stop
