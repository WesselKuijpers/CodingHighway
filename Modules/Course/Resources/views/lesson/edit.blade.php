@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6 offset-md-4 mt-3 mb-3">
            <h2 class="text-center page-header">Update een les in de cursus {{ $course->name }}</h2>
        </div>
    </div>

    @include('course::shared.lesson_update_form', ['lesson' => $lesson, 'course' => $course, 'levels' => $levels])

@endsection
