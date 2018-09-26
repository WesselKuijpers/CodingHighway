@if(isset($exercise))
    <div class="row">
        <div class="col-md-6 offset-md-4 mt-3 mb-3">
            <h2 class="text-center page-header">Update {{ $exercise->name }} in de cursus {{ $course->name }}</h2>
        </div>
    </div>
    <form method="post" action="/course/{{$course['id']}}/exercise/{{$exercise['id']}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10, 'value' => $exercise['content']])
        <label for="is_final">test</label>
        <select name="is_final" class="form-control col-md-6">
            <option value="1">Ja</option>
            <option value="0">Nee</option>
        </select>
        @include('shared.form', ['label' => 'Opdrachtafbeeldingen', 'name' => 'media[]', 'type' => 'file', 'value' => $exercise['file'], 'multiple' => true])
        @if(isset($levels))
            <select name = "level_id">
                @foreach($levels as $level)
                    <option value="{{$level['id']}}">{{$level['name']}}</option>
                @endforeach
            </select>
        @endif
@else
    <div class="col-md-6 offset-md-4 mt-3 mb-3">
        <h2 class="text-center page-header">Creeër een nieuwe opdracht in de cursus {{ $course->name }}</h2>
    </div>
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
        @if(isset($levels))
            <select name="level_id">
                @foreach($levels as $level)
                    <option value="{{$level['id']}}">{{$level['name']}}</option>
                @endforeach
            </select>
        @endif
@endif
        {{ csrf_field() }}
        <input type="hidden" value="{{$course['id']}}" name="course_id">
        <input type="submit" value="aanmaken">
    </form>