@extends('layouts.app')
@section('content')

    <h2 class="text-center page-header">Pas een cursus aan</h2>

    @include('course::shared.course_update_form', ['course' => $course])

@endsection
