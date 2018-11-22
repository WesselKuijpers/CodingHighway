@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>Gebruiker</th>
          @foreach($roles as $role)
            <th>{{ $role->name }}</th>
          @endforeach
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
          <tr>
            <td>{{ $user->getFullName() }}</td>
            @foreach($roles as $role)
              <td
                class="rcb"
                data-user_id="{{ $user->id }}"
                data-role_slug="{{ $role->slug }}"
                data-checked="{{ ($user->hasRole($role->id) ? 1 : 0) }}"
                data-api="{{ $user->api_token }}"
                data-role_name="{{ $role->name }}"
              />
            @endforeach
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
