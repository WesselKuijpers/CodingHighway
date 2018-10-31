@extends('layouts.app')

@section('content')
  <h1>Moeilijkheidsgraden</h1>
  @if(count($levels) != 0)
    <table class="table">
      <tr>
        <td>Naam</td>
        <td>Acties</td>
      </tr>
      @foreach($levels as $level)
        <tr>
          <td>{{ $level->name }}</td>
          <td><a class="btn btn-danger" href={{ route('level.destroy', ['level_id' => $level->id]) }}><i class="fas fa-times"></i></a></td>
          <td><a class="btn btn-organisation" href={{ route('level.edit', ['level_id' => $level->id]) }}>Aanpassen</a></td>
        </tr>
      @endforeach
    </table>
  @else
    <p>Geen moeilijkheden gevonden. @if(Auth::user()->hasRole('sa'))<a href="{{ route('level.create') }}">Maak er een aan</a>@endif</p>
  @endif
@endsection