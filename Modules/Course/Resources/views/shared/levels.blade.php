@if(isset($levels))
  <div class="form-group" id="level">
    <label for="level" class="text-md-right font-weight-bold">Moeilijkheidsgraad</label>
    <select name="level_id" class="form-control">
      @foreach($levels as $level)
        <option value="{{$level['id']}}">{{$level['name']}}</option>
      @endforeach
    </select>
  </div>
@endif
