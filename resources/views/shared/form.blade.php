<div class="form-group">
    @if($type=="checkbox" || $type=="color" || $type=="textarea" || $type=="file")
        <label class="bold" for="{{ $name }}">{{ $label }}</label>
    @endif
    <input placeholder="{{ $label }}" id="{{ $name }}" type="{{ $type }}"
           @if(isset($class))class="{{ $class }}{{ $errors->has($name) ? ' is-invalid' : '' }}" @endif
           name="{{ $name }}" value="@if(isset($value)){{$value}}@endif"
           @if(isset($multiple) && $multiple) multiple @endif>

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
    @endif
</div>
