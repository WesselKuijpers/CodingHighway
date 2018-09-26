@extends('layouts.app')
@section('content')

    @include('course::shared.lesson_create_form', ['course' => $course, 'levels' => $levels])

@endsection