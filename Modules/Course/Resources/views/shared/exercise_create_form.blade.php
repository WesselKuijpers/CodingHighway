@if(isset($exercise))
    <form method="post" action="/course/{{$course['id']}}/exercise/{{$exercise['id']}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10, 'value' => $exercise['content']])
        <select name="is_final">
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
    <form method="post" action="/course/{{$course['id']}}/exercise" enctype="multipart/form-data">
        @include('shared.textarea', ['label' => 'Inhoud', 'name'=> 'content', 'required' => true, 'rows' => 10])
        <select name="is_final">
            <option value="1">Ja</option>
            <option value="0">Nee</option>
        </select>
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