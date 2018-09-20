<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right font-weight-bold">{{ $label }}</label>

    <div class="col-md-6">
        <textarea id="{{ $name }}" type="{{ $type }}" class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}" name="{{ $name }}"  @if($required) required @endif @if(isset($rows)) rows="{{$rows}}" @endif>
            @if(isset($value)) {{$value}} @endif
        </textarea>

        @if ($errors->has($name))
            <span class="invalid-feedback" role="alert">
          <strong>{{ $errors->first($name) }}</strong>
      </span>
        @endif
    </div>
</div>
