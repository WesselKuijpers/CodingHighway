{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

  @include('shared.form_title', ['title'=>$exercise->title])
  @if($exercise->level != null)
    <p><b>Moeilijkheid:</b> {{$exercise->level->name}}</p>
  @endif
  <p>Dit is @if($exercise->is_final) een @else geen @endif eindopdracht</p>
  <hr>
  <p>Media:</p>
  @foreach($exercise->media as $media)
    <a href="{{ $media->content }}" class="btn btn-primary btn-organisation" target="_blank">File {{ $media->id }}</a>
  @endforeach
  <p>{!! $exercise->content !!}</p>
  <p>
    <form action="{{$solution != null ? route('solution.update', ['id' => $solution->id]) : route('solution.create')}}" method="POST" enctype="multipart/form-data">
      @csrf
      @if($solution != null)
        @method('PUT')
        <input type="hidden" name="id" value={{$solution->id}}>
      @endif
      <input type="hidden" name="exercise_id" value={{ $exercise->id}}>
      <div class="row">
        <div class="col-12">
          <textarea name="content" placeholder="Plaats jouw oplossing hier" class="form-control textarea" rows="10">@if($solution != null){{$solution->content }}@endif</textarea>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="offset-1">
          <strong>Bestanden:</strong>
        </div>
        <div class="col-2">
          <input type="file" name="media[]"> 
        </div>
      </div>
      @if($solution != null && $solution->media->count() != 0)
        <div class="row">
          <div class="col-12">
            <ul>
              @foreach($solution->media as $media)
                <li><a href="{{$media->content}}">{{$media->content}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
      @endif
      <br>
      <div class="row">
        <div class="ml-3 mb-2">
          <input type="submit" class="btn btn-primary btn-organisation" value="Opslaan">
        </div>
    </form>
      @if($solution != null)
        <form method="POST" action="{{route('solution.delete', ['id' => $solution->id])}}">
          <div class="offset-1">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value={{$solution->id}}>
            @if($solution != null)
              <input type="submit" class="btn btn-danger" value="Verwijderen">
            @endif
          </div>
        </form>
      @endif
    </div>
  </p>
  <hr>
  @if($solution != null && $solution->reviews->count() != null)
    <div class="row">
      <div class="col-12">
      <h3>Bestaande reviews:</h3>
      @foreach($solution->reviews->sortByDesc('created_at') as $review)
        <hr>
        <p><strong>Beoordelaar: </strong>{{$review->user->getFullname()}}</p>
        <p><strong>Geplaatst: </strong>{{\Carbon\Carbon::parse($review->created_at)->diffForHumans()}}</p>
        <p><strong>Beoordeling: </strong>{{($review->rating == 1) ? "Positief" : "Negatief"}}</p>
        {!!$review->content!!}
      @endforeach
      </div>
    </div>
    <hr>
  @endif
  <p>
    <form action="{{ route('progress.create') }}" method="POST">
      @csrf
      <input type="hidden" name="user_id" value="{{ Auth::id() }}"/>
      <input type="hidden" name="course_id" value="{{ $exercise->course->id }}"/>
      <input type="hidden" name="exercise_id" value="{{ $exercise->id }}"/>
      <input type="submit" class="btn btn-primary btn-organisation" value="Opdracht afronden"/>
      <input type="button" class="btn btn-primary" value="Terug" onclick="location.href='{{ route('course.show',
      ['course_id' => $exercise->course->id])}}'">
    </form>
  </p>

@endsection