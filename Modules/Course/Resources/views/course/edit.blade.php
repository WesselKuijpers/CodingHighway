@extends('layouts.app')
@section('content')

    @include('course::shared.course_form', ['course' => $course])

@endsection
