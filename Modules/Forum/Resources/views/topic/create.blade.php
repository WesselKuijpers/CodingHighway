@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 page-header">
      <h1>Maak een nieuwe Topic</h1>
    </div>
    <div class="col-12">
      <form action="{{ route('TopicSave') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="name" class="input-group-text">Naam: </label>
          </div>
          <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="media" class="input-group-text">Logo</label>
          </div>
          <input type="file" id="media" name="media" class="form-control">
        </div>

        <div class="input-group form-group">
          <div class="input-group-prepend">
            <label for="course_id" class="input-group-text">Cursus</label>
          </div>
          <select name="course_id" id="course_id" class="form-control">
            <option selected disabled>---------------------</option>
            @foreach($courses as $course)
              <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="input-group form-group">
          <input type="submit" id="submit" name="submit" value="Opslaan" class="btn btn-primary btn-organisation">
        </div>
      </form>
    </div>
  </div>
@endsection