@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
        {{--
        <div class="card-header">Wijzigen van mijn account</div>
        <div class="card-body">
          <form action="{{ route('UserEditSave') }}" method="post">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <div class="input-group form-group">
                <label for="firstname" class="" style="width: 150px">Voornaam</label>
              <input type="text" id="firstname" name="firstname" class="form-control" value="{{ $user->firstname }}">
            </div>

            <div class="input-group form-group">
              <div class="input-group-prepend">
                <label for="insertion" class="input-group-text" style="width: 150px">Tussenvoegsels</label>
              </div>
              <input type="text" id="insertion" name="insertion" class="form-control" value="{{ $user->insertion }}">
            </div>

            <div class="input-group form-group">
                <label for="lastname" class="input-group-text" style="width: 150px">Achternaam</label>
              <input type="text" id="lastname" name="lastname" class="form-control" value="{{ $user->lastname }}">
            </div>

            <div class="input-group form-group">
                <label for="email" class="input-group-text" style="width: 150px">Email</label>
              <input type="text" id="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
            </div>

            <input type="submit" value="Wijzigen" name="sub" class="form-control btn btn-primary" style="
              color: {{ Auth::user()->organisation()->fontcolor }};
              background-color: {{ Auth::user()->organisation()->color }};
            ">
          </form>
        </div>
        --}}

        <div class="container contact-form">
          <form method="post" action="{{ route('UserEditSave') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ $user->id }}">

            <h3 class="text-center page-header">Wijzig mijn gegevens</h3>
            <div class="row">
              <div class="offset-1 col-md-10">
                <div class="form-group">
                  <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Voornaam *" value="{{ Auth::user()->firstname }}">
                </div>
                <div class="form-group">
                  <input type="text" id="insertion" name="insertion" class="form-control" placeholder="Tussenvoegsel" value="{{ Auth::user()->insertion }}">
                </div>
                <div class="form-group">
                  <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Achternaam *" value="{{ Auth::user()->lastname }}">
                </div>
                <div class="form-group">
                  <input type="text" id="email" name="email" class="form-control" placeholder="Email *" value="{{ Auth::user()->email }}" readonly>
                </div>
                <div class="form-group">
                  <input type="submit" value="Wijzigen" name="sub" class="btnContact" style="color: @if(!empty(Auth::user()->organisation())) {{ Auth::user()->organisation()->fontcolor}}; @endif
                  background-color: @if(!empty(Auth::user()->organisation())) {{Auth::user()->organisation()->color}}; @endif" />
                </div>
              </div>
            </div>
          </form>
        </div>
    </div>
  </div>
@endsection