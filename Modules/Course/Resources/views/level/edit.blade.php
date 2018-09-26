@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Pas de moeilijkheid aan"])

    @include('course::shared.level_update_form', ['level' => $level])

@endsection