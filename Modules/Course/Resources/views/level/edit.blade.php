@extends('layouts.app')
@section('content')

    @include('course::shared.level_create_form', ['level' => $level])

@endsection