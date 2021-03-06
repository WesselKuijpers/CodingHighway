<div class="form-group">
    <textarea placeholder="{{ $label }}" id="{{ $name }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }} textarea" name="{{ $name }}"
              @if(isset($rows)) rows="{{$rows}}" @endif>@if(isset($value)) {{$value}} @endif</textarea>

    @if ($errors->has($name))
        <span class="invalid-feedback" role="alert">
      <strong>{{ $errors->first($name) }}</strong>
    </span>
    @endif
</div>
