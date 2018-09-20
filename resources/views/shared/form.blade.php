<div class="form-group row">
  <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ $label }}</label>

  <div class="col-md-6">
    <input id="{{ $name }}" type="{{ $type }}" @if(isset($class))class="{{ $class }}{{ $errors->has($name) ? ' is-invalid' : '' }}"@endif
           name="{{ $name }}" value="@if(isset($value)) {{$value}} @endif" @if(isset($multiple) && $multiple) multiple @endif>

    @if ($errors->has($name))
      <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
    @endif
  </div>
</div>