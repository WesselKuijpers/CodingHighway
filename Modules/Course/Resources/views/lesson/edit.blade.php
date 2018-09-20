@extends('layouts.app')
@section('content')

    @include('course::shared.lesson_form', ['lesson' => $lesson, 'course' => $course, 'levels' => $levels])

@endsection
