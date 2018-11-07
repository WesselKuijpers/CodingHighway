@extends('layouts.app')

@section('content')

  @include('shared.form_title', ['title' => "Organisatie aanvragen"])
  <div class="row">
    @if ($organisations->count() == 0)
      <p>Er zijn nog geen organisatie aanvragen gevonden.</p>
    @else
      @foreach($organisations as $organisation)
        <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-2 mt-2">
          <div class="card custom-card organisation-card">
            <div class="card-header">
              {{ $organisation->name }}
            </div>

            <div class="card-body">
              <div class="row">
                <div class="col-6">
                  <p>Straat:</p>
                </div>
                <div class="col-6">
                  <p>{{ $organisation->street }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Huisnummer:</p>
                </div>
                <div class="col-6">
                  <p>{{ $organisation->housenumber }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Postcode:</p>
                </div>
                <div class="col-6">
                  <p>{{ $organisation->zipcode }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Huisnummer:</p>
                </div>
                <div class="col-6">
                  <p>{{ $organisation->housenumber }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Plaats:</p>
                </div>
                <div class="col-6">
                  <p>{{ $organisation->city }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Papieren factuur:</p>
                </div>
                <div class="col-6">
                  <p>{{ ($organisation->paper_invoice) ? "ja" : "nee" }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Achtergrondkleur:</p>
                </div>
                <div class="col-6">
                  <p>{{ ($organisation->color) }}</p>
                </div>
              </div>

              <div class="row">
                <div class="col-6">
                  <p>Textkleur:</p>
                </div>
                <div class="col-6">
                  <p>{{ ($organisation->fontcolor) }}</p>
                </div>
              </div>

              @if(!empty($organisation->phone))
                <div class="row">
                  <div class="col-6">
                    <p>Telefoonnummer:</p>
                  </div>
                  <div class="col-6">
                    <p>{{ ($organisation->phone) }}</p>
                  </div>
                </div>
              @endif
            </div>

            <div class="card-footer">
              @if(!$organisation->active)
                <form action="{{ route('organisation.activate') }}" method="post">
                  @csrf
                  <input type="hidden" name="organisation_id" value="{{ $organisation->id }}">
                  <input type="submit" value="Activeren" class="btn btn-primary btn-organisation">
                </form>
              @else
                Organisatie geactiveerd
              @endif
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@stop
