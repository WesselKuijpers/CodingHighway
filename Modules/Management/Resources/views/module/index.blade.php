@extends('layouts.app')

@section('content')
  <div class="row col-12">
    <table class="table table-hover">
      <thead>
      <tr>
        <th>Module name</th>
        <th>Status</th>
        <th>Actie:</th>
      </tr>
      </thead>
      <tbody>
      @foreach($modules as $module)
        @if($module->name != "Management")
          <tr>
            <td>{{ $module->name }}</td>
            @if($module->enabled())
              <td>Aan</td>
            @else
              <td>Uit</td>
            @endif
            <td>
              @if($module->enabled())
                <a href="{{ route('ModuleUit', ['module' => $module->name]) }}" class="btn btn-danger">Zet uit</a>
              @else
                <a href="{{ route('ModuleAan', ['module' => $module->name]) }}" class="btn btn-success">Zet aan</a>
              @endif
            </td>
          </tr>
        @endif
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
