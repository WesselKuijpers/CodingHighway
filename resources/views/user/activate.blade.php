@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          Account activeren: {{ $user->getFullname() }}
        </div>

        <div class="card-body">
          <form action="{{ route('UserActivateLicenseSave') }}" method="post">
            @csrf
            <input type="hidden" value="{{ Auth::id() }}" name="user_id">

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="key" class="input-group-text">Licentie Code</label>
              </div>
              <input type="text" id="key" name="key" class="form-control">
            </div>

            <div class="text-right">
              <input type="submit" value="Activeren" class="btn btn-info">
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
@endsection