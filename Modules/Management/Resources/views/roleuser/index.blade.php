@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>Gebruiker</th>
          <th>Rollen</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->getFullName() }}</td>
            <td>
              @foreach($roles as $role)
                @if($user->hasRole($role->id))
                  {{ $role->name }}<br>
                @endif
              @endforeach
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
