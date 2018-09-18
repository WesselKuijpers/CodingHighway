<div class="form-group row">
  <label for="name" class="col-md-4 col-form-label text-md-right">{{ $label }}</label>

  <div class="col-md-6">
    <input id="{{ $name }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}"
           name="{{ $name }}" value="{{ old($name) }}" required>

    @if ($errors->has($name))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
    @endif
  </div>
</div>