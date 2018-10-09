<div class="row form-group" id="next-lesson">
    <label for="next-lesson" class="col-md-4 col-form-label text-md-right font-weight-bold">Volgende les:</label>
    <div class="col-md-6">
        <select name="next_lesson" class="form-control">
            <option value="null">Geen</option>
            @foreach($lessons as $lesson)
                <option value="{{$lesson->id}}" class="text-truncate pt-2">{{$lesson->title}}</option>
            @endforeach
        </select>
    </div>
</div>
