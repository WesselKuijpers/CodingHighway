@if(isset($levels))
    <div class="row form-group" id="level">
        <label for="level" class="col-md-4 col-form-label text-md-right font-weight-bold">Moeilijkheidsgraad</label>
        <div class="col-md-6">
            <select name="level_id" class="form-control">
                @foreach($levels as $level)
                    <option value="{{$level['id']}}">{{$level['name']}}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
