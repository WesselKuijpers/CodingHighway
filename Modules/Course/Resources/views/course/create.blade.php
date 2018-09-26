@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Creeër een cursus"])

    @include('course::shared.course_create_form')

@endsection
