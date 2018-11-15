@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12 text-right">
      <a href="{{ route('role.create') }}" class="btn btn-info">Maak een nieuwe Rol</a>
    </div>
    <div class="col-12">
      <table class="table table-hover">
        <thead>
        <tr>
          <th>Role</th>
          <th>Permissions</th>
          <th>actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
          <tr>
            <td>{{ $role->name }}</td>
            <td>
              <ul>
                @foreach($role->permissions as $permission)
                  <li><strong>{{ $permission->name }}</strong>: {{ $permission->description }}</li>
                @endforeach
              </ul>
            </td>
            <td>
              <a href="{{ route('role.edit', ['id' => $role->id]) }}" class="btn btn-primary">Edit</a>
              <form action="{{ route('role.destroy', ['id'=> $role->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $role->id }}">
                <input type="submit" value="DELETE" class="btn btn-danger">
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
@endsection
