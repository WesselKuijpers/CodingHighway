@extends('layouts.app')

@section('content')
  <div class="row">
    <div class="col-12">
      <form action="{{ route('role.store') }}" method="post">
        @csrf

        @include('shared.form_title', ['title' => "Maak een nieuwe Rol"])
        @include('shared.form_required', ['label' => 'Naam', 'name'=> 'name', 'type'=> 'text','class' => 'form-control', 'value' => old('name')])
        @include('shared.form_required', ['label' => 'Slug', 'name'=> 'slug', 'type'=> 'text','class' => 'form-control', 'value' => old('slug')])
        @include('shared.form', ['label' => 'Description', 'name'=> 'description', 'type'=> 'text','class' => 'form-control', 'value' => old('description')])
        @include('shared.form_required', ['label' => 'Level', 'name'=> 'level', 'type'=> 'number','class' => 'form-control', 'value' => old('number')])

        @include('shared.form_title', ['title' => "Selecteer de rechten van de rol"])
        <div class="row">
          @foreach($permissions as $permission)
            <div class="col-6">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="permissions[]"
                       id="permission{{ $permission->id }}"
                       value="{{ $permission->id }}">
                <label class="form-check-label" for="permission{{ $permission->id }}">
                  <strong>{{ $permission->name }}</strong>: {{ $permission->description }}
                </label>
              </div>
            </div>
          @endforeach
        </div>
        @include('shared.submit_button')
      </form>
    </div>
  </div>
@endsection