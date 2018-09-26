@extends('layouts.app')
@section('content')

    @include('shared.form_title', ['title' => "Creeër een nieuwe moeilijkheid"])

    @include('course::shared.level_create_form')

@endsection