@extends('layouts.app')
@section('content')

    @include('course::shared.exercise_create_form', ['course' => $course, 'exercise' => $exercise])

@endsection