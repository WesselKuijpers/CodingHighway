@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Creeër een nieuwe opdracht in de cursus $course->name"])

    @include('course::shared.exercise_create_form', ['course' => $course, 'levels' => $levels])

@endsection