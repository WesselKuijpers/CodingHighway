@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "pas een opdracht in de cursus $course->name"])

    @include('course::shared.exercise_update_form', ['course' => $course, 'exercise' => $exercise, 'levels' => $levels])

@endsection