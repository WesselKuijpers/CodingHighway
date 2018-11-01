{{-- Page to create a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
<div class="row">
    <div class="col-12">
        <div class="container contact-form">
            {{-- Including the form title --}}
            @include('shared.form_title', ['title' => "Creeër een cursus"])
            @include('shared.error')
            <form method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
                @include('shared.form_required', ['label' => 'Titel', 'name'=> 'name', 'type'=> 'text',
                'class' => 'form-control'])
                @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text',
                'required' => true, 'rows' => 7, 'class' => ''])
                @include('shared.form_required', ['label' => 'Cursus kleur', 'name'=> 'color', 'type'=> 'color',
                'class' => 'w-25'])
                @include('shared.form', ['label' => 'Cursus afbeelding', 'name' => 'media', 'type' => 'file',
                'class' => ''])
                {{ csrf_field() }}
                @include('shared.submit_button')
            </form>
        </div>
    </div>
</div>

@endsection
