@extends('layouts.app')

@section('content')
  <div class="row">
    @if ($organisations->count() == 0)
      <p>Geen organisaties gevonden.</p>
    @else
      @foreach($organisations as $organisation)
        <div class="col-4">
          <div class="card">
            <div class="card-header">
              {{ $organisation->name }}
            </div>
            <div class="card-body">
              <table>
                <tr>
                  <td class="text-right">Straat:</td>
                  <td>{{ $organisation->street }}</td>
                </tr>
                <tr>
                  <td class="text-right">Huisnummer:</td>
                  <td>{{ $organisation->housenumber }}</td>
                </tr>
                <tr>
                  <td class="text-right">Postcode:</td>
                  <td>{{ $organisation->zipcode }}</td>
                </tr>
                <tr>
                  <td class="text-right">Plaats:</td>
                  <td>{{ $organisation->city }}</td>
                </tr>
                <tr>
                  <td class="text-right">Papieren Factuur:</td>
                  <td>{{ ($organisation->paper_invoice) ? "ja" : "nee" }}</td>
                </tr>
                <tr>
                  <td class="text-right">Achtergrondkleur:</td>
                  <td>{{ $organisation->color }}</td>
                </tr>
                <tr>
                  <td class="text-right">Textkleur:</td>
                  <td>{{ $organisation->fontcolor }}</td>
                </tr>
                <tr>
                  <td class="text-right">Link:</td>
                  <td>{{ $organisation->link }}</td>
                </tr>
                <tr>
                  <td class="text-right">Telefoonnummer:</td>
                  <td>{{ $organisation->phone }}</td>
                </tr>
              </table>
            </div>
            <div class="card-footer">
              @if(!$organisation->active)
                <form action="{{ route('organisation.activate') }}" method="post">
                  @csrf
                  <input type="hidden" name="organisation_id" value="{{ $organisation->id }}">
                  <input type="submit" value="Activeren" class="btn btn-primary btn-organisation">
                </form>
              @else
                Organisatie Al Geactiveerd
              @endif
            </div>
          </div>
        </div>
      @endforeach
    @endif
  </div>
@stop
