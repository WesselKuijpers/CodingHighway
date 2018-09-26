@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Creeër een nieuwe les in de cursus $course->name"])

    @include('course::shared.lesson_create_form', ['course' => $course, 'levels' => $levels])

@endsection