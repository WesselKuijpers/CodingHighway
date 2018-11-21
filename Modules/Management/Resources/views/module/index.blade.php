@extends('layouts.app')

@section('content')
  <div class="row col-12">
    <table class="table table-hover">
      <thead>
      <tr>
        <th>Module name</th>
        <th>Live / uit</th>
      </tr>
      </thead>
      <tbody>
      @foreach($modules as $module)
        <tr>
          <td>{{ $module->name }}</td>
          @if($module->enabled())
            <td>Live</td>
          @else
            <td>Uit</td>
          @endif
          <td>
            <a href="{{ route('ModuleAan', ['module' => $module->name]) }}" class="btn btn-success">Zet aan</a>
          </td>
          <td>
            <a href="{{ route('ModuleUit', ['module' => $module->name]) }}" class="btn btn-danger">Zet uit</a>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
@endsection
