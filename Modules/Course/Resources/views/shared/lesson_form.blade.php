@if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
@endif
@if(isset($lesson))
    <form method="post" action="/course/{{$course['id']}}/lesson/{{$lesson['id']}}" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'value' => $lesson['title']])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'value' => $lesson['content'], 'required' => true])
        @if(isset($levels))
            <select name="level_id">
                @foreach($levels as $level)
                    <option value="{{$level['id']}}">{{$level['name']}}</option>
                @endforeach
            </select>
        @endif
@else
    <form method="post" action="/course/{{$course['id']}}/lesson" enctype="multipart/form-data">
        @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text'])
        @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])
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
