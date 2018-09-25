@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">Wijzigen van mijn account</div>
        <div class="card-body">
          <form action="{{ route('UserEditSave') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="firstname" class="input-group-text" style="width: 150px">Voornaam</label>
              </div>
              <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $user->firstname }}">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="insertion" class="input-group-text" style="width: 150px">Tussenvoegsels</label>
              </div>
              <input type="text" id="insertion" name="insertion" class="form-control" value="{{ $user->insertion }}">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="lastname" class="input-group-text" style="width: 150px">Achternaam</label>
              </div>
              <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $user->lastname }}">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="email" class="input-group-text" style="width: 150px">Email</label>
              </div>
              <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <input type="submit" value="Wijzigen" name="sub" class="form-control btn btn-info">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection