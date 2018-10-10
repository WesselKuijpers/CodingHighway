<div class="row form-group" id="next-exercise">
    <label for="next-exercise" class="col-md-4 col-form-label text-md-right font-weight-bold">Volgende opdracht:</label>
    <div class="col-md-6">
        <select name="next_exercise" class="form-control">
            <option value="0">Geen</option>
            @foreach($exercises as $exercise)
                <option value="{{$exercise->id}}" class="text-truncate pt-2">{{$exercise->title}}</option>
            @endforeach
        </select>
    </div>
</div>
