<div class="row form-group" id="next-exercise">
    <label for="next-exercise" class="col-md-4 col-form-label text-md-right font-weight-bold">Volgende opdracht:</label>
    <div class="col-md-6">
        <select name="next_id" class="form-control">
            <option value="0">Geen</option>
            
            @if(App\Models\course\Exercise::count() != 0)
                @foreach($exercises as $exercise)
                    <option value="{{$exercise->id}}" class="text-truncate pt-2">{{$exercise->title}}</option>
                @endforeach 
            @endif
        </select>
    </div>
</div>
