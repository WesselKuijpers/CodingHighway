<form method="post" action="/course/{{$course['id']}}/lesson/{{$lesson['id']}}" enctype="multipart/form-data">
    {{ method_field('PUT') }}

    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'value' => $lesson['title']
    , 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'value' => $lesson['content'], 'required' => true
    , 'class' => 'form-control'])
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

    {{ csrf_field() }}

    <input type="hidden" value="{{$course['id']}}" name="course_id">

    <div class="row form-group" id="level">
        <div class="offset-4 col-md-6">
            <input type="submit" class="btn" value="Opslaan">
        </div>
    </div>
</form>