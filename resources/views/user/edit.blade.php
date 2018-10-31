@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-md-12">
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