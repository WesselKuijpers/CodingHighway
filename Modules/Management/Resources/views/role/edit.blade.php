@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="{{ route('role.update', ['id'=>$role->id]) }}" method="post">
        @csrf
        @method('PUT')

        <input type="hidden" name="id" value="{{ $role->id }}">

        @include('shared.form_title', ['title' => "Maak een nieuwe Rol"])
        @include('shared.form_required', ['label' => 'Naam', 'name'=> 'name', 'type'=> 'text','class' => 'form-control', 'value' => $role->name])
        @include('shared.form_required', ['label' => 'Slug', 'name'=> 'slug', 'type'=> 'text','class' => 'form-control', 'value' => $role->slug])
        @include('shared.form', ['label' => 'Description', 'name'=> 'description', 'type'=> 'text','class' => 'form-control', 'value' => $role->description])
        @include('shared.form_required', ['label' => 'Level', 'name'=> 'level', 'type'=> 'number','class' => 'form-control', 'value' => $role->level])

        @include('shared.form_title', ['title' => "Selecteer de rechten van de rol"])
        <div class="row">
          @foreach($permissions as $permission)
            <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]"
                       id="permission{{ $permission->id }}"
                       value="{{ $permission->id }}"
                       @if($role->permissions->where('slug', $permission->slug)->count() == 1)
                       checked
                  @endif
                >
                <label class="form-check-label" for="permission{{ $permission->id }}">
                  <strong>{{ $permission->name }}</strong>: {{ $permission->description }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
        @include('shared.submit_button')
        @include('shared.error')
      </form>
    </div>
  </div>
@endsection