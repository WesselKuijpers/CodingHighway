@if(isset($lesson))
    <!-- Update -->
    <div class="row">
        <div class="col-md-6 offset-md-4 mt-3 mb-3">
            <h2 class="text-center page-header">Update een les in de cursus {{ $course->name }}</h2>
        </div>
    </div>
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
@else
    <!-- Create -->
    <div class="row">
        <div class="col-md-6 offset-md-4 mt-3 mb-3">
            <h2 class="text-center page-header">Creeër een les in de cursus {{ $course->name }}</h2>
        </div>
    </div>
<form method="post" action="/course/{{$course['id']}}/lesson" enctype="multipart/form-data">
    @include('shared.form_required', ['label' => 'Titel', 'name'=> 'title', 'type'=> 'text', 'class' => 'form-control'])
    @include('shared.textarea', ['label' => 'Inhoud', 'name' => 'content', 'required' => true])
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
    @endif
    {{ csrf_field() }}
    <input type="hidden" value="{{$course['id']}}" name="course_id">

    <div class="row form-group" id="level">
        <div class="offset-4 col-md-6">
            <input type="submit" class="btn" value="Opslaan">
        </div>
    </div>
</form>
