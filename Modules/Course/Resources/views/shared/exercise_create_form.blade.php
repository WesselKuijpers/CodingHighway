<form method="post" action="/course/{{$course['id']}}/exercise" enctype="multipart/form-data">
    @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10])
    <div class="row">
        <label for="is_final" class="col-md-4 col-form-label text-md-right font-weight-bold">Eindopdracht</label>
        <div class="col-md-6 form-group">
            <select name="is_final" class="form-control">
                <option value="1">Ja</option>
                <option value="0">Nee</option>
            </select>
        </div>
    </div>

    @include('shared.form', ['label' => 'Opdrachtafbeeldingen', 'name' => 'media[]', 'type' => 'file', 'multiple' => true])

    @include('course::shared.levels', ['levels' => $levels])

    {{ csrf_field() }}
    <input type="hidden" value="{{$course['id']}}" name="course_id">
    @include('shared.submit_button')
</form>