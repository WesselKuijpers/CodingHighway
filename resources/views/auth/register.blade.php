@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Register') }}</div>

          <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
              @csrf

              @include('shared.form_required', ['label' => 'Voornaam', 'name'=> 'firstname', 'type'=> 'text'])
              @include('shared.form',          ['label' => 'Tussenvoegsel', 'name'=> 'insertion', 'type'=> 'text'])
              @include('shared.form_required', ['label' => 'Achternaam', 'name'=> 'lastname', 'type'=> 'text'])
              @include('shared.form_required', ['label' => 'Email', 'name'=> 'email', 'type'=> 'email'])
              @include('shared.form_required', ['label' => 'Wachtwoord', 'name'=> 'password', 'type'=> 'password'])
              @include('shared.form_required', ['label' => 'Wachtwoord bevestigen', 'name'=> 'password_confirmation', 'type'=> 'password'])

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
