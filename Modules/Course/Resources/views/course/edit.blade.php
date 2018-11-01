{{-- Page to edit a course --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')
  <div class="row">
    <div class="col-12">
      <div class="container contact-form">
        {{-- Including the form title --}}
        @include('shared.form_title', ['title' => "Pas de cursus '$course->name' aan"])
        @include('shared.error')
        <form method="post" action="{{ route('course.update', ['id'=> $course->id]) }}" enctype="multipart/form-data">
          <input type="hidden" name="id" value="{{ $course->id }}">
          {{ method_field('PUT') }}
          <div class="row">
            <div class="offset-md-1 col-md-10 col-12">
          @include('shared.form_required', ['label' => '', 'name'=> 'name', 'type'=> 'text',
          'value' => $course->name, 'class' => 'form-control'])
          @include('shared.textarea', ['label' => 'Beschrijving', 'name'=> 'description', 'type'=> 'text',
          'required' => true, 'rows' => 10, 'value' => $course->description, 'class' => ''])
          @include('shared.form_required', ['label' => 'Cursus kleur', 'name'=> 'color', 'type'=> 'color',
          'value' => $course->color])
          @include('shared.form', ['label' => 'Cursus afbeelding', 'name' => 'media', 'type' => 'file',
          'value' => 'file', 'class' => ''])
          {{ csrf_field() }}
          @include('shared.submit_button')
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
