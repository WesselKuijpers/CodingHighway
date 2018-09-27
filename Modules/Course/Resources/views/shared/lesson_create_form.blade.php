<form method="post" action="/course/{{$course['id']}}/lesson" enctype="multipart/form-data">
    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])

    <div class="row">
      <label for="media" class="col-md-4 col-form-label text-md-right font-weight-bold">Media</label>
      <div class="col-md-6">
        <input type="file" id="media" name="media[]" multiple>
      </div>
    </div>
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

    @include('shared.submit_button')
</form>
