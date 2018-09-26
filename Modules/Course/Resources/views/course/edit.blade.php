@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Pas een cursus aan"])

    @include('course::shared.course_update_form', ['course' => $course])

@endsection
