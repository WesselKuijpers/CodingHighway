@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Pas een opdracht aan in de cursus $course->name"])

    @include('course::shared.lesson_update_form', ['lesson' => $lesson, 'course' => $course, 'levels' => $levels])

@endsection
