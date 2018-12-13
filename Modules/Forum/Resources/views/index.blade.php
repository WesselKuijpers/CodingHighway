@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1>Forum</h1>
    </div>
    <div class="col-12">
      <div class="list-group">
        @foreach($topics as $topic)
          <a href="#" class="list-group-item list-group-item-action">
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
