<div class="row form-group" id="next-id">
    <label for="next-lesson" class="col-md-4 col-form-label text-md-right font-weight-bold">Volgende les:</label>
    <div class="col-md-6">
        <select name="next_id" class="form-control">
            <option value="0">Geen</option>
            
            @if(App\Models\course\Lesson::count() != 0)
                @foreach($lessons as $lesson)
                    <option value="{{$lesson->id}}" class="text-truncate pt-2">{{$lesson->title}}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
