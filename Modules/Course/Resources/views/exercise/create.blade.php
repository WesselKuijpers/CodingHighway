{{-- Page to create an exercise --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Including the form title --}}
    @include('shared.form_title', ['title' => "Creeër een nieuwe opdracht in de cursus $course->name"])
    @include('shared.error')
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
        @include('course::shared.select_exercise', ['exercises' => $course->exercises])

        
        <div class="form-group row">
            <label for="is_first" class="col-md-4 col-form-label text-md-right font-weight-bold">Eerste opdracht?</label>
          
            <div class="col-md-6">
              <input type="checkbox" name="is_first" value="1" id="is_first">
            </div>
        </div>

        {{ csrf_field() }}
        <input type="hidden" value="{{$course['id']}}" name="course_id">
        @include('shared.submit_button')
    </form>

@endsection