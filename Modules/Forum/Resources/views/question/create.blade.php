@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1>Maak een vraag over {{ $topic->name }}</h1>
    </div>
    <div class="col-12">
      <form action="{{ route('QuestionCreate', ['topic' => $topic->slug]) }}" method="post">
        @csrf
        <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="title" class="input-group-text">Titel: </label>
          </div>
          <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="lesson_id" class="input-group-text">Les</label>
          </div>
          <select name="lesson_id" id="lesson_id" class="form-control">
            <option selected disabled>------------------</option>
            @foreach($lessons as $lesson)
              <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
            @endforeach
          </select>
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="lesson_id" class="input-group-text">Opdracht</label>
          </div>
          <select name="lesson_id" id="lesson_id" class="form-control">
            <option selected disabled>------------------</option>
            @foreach($exercises as $exercise)
              <option value="{{ $exercise->id }}">{{ $exercise->title }}</option>
            @endforeach
          </select>
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="content" class="input-group-text">Omschrijving: </label>
          </div>
          <textarea class="form-control textarea" name="content" id="content" cols="30" rows="10"></textarea>
        </div>

        <div class="input-group form-group">
          <input type="submit" id="submit" name="submit" value="Opslaan" class="btn btn-primary btn-organisation">
        </div>
      </form>
    </div>
  </div>
@endsection