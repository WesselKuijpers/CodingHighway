@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-12">
      <h1>{{$solution->exercise->title}}</h1>
      <p><strong>Gemaakt door: </strong>{{$solution->user->getFullname()}}</p>
      <hr>
    </div>
    <div class="col-12">
        <div class="row">
          <div class="col-12">
            <h3>Inhoud:</h3>
            {!!$solution->content!!}
          </div>
          <div class="col-12">
            <h3>bestanden:</h3>
            <ul>
              @foreach($solution->media as $media)
                <li><a href="{{$media->content}}">{{$media->content}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
    </div>
  </div>
  <hr>
  <div class="row">
      <div class="col-12">
          <h3>Nakijken:</h3>
          <form method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{Auth::id()}}">
            <input type="hidden" name="solution_id" value="{{$solution->id}}">
            <textarea name="content" class="textarea"></textarea>
            <br>
            <input id="positive" type="radio" value="1" name="rating">
            <label for="positive">Positief</label><br>
            <input id="negative" type="radio" value="-1" name="rating">
            <label for="negative">Negatief</label><br>
            <input type="submit" value="opslaan" class="btn btn-primary btn-organisation">
          </form>
        </div>
  </div>

@endsection