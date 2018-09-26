@extends('layouts.app')
@section('content')

    @include('course::shared.level_update_form', ['level' => $level])

@endsection