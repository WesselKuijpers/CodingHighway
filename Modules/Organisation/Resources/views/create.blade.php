@extends('layouts.app')

@section('content')
  @include('shared.form_title', ['title' => "Vraag een organisatie aan"])
  @include('shared.error')
  <form method="POST" action="{{ route('organisation.store') }}" enctype="multipart/form-data">
      <input type="hidden" name="paper_invoice" value="0">
      @include('shared.form_required', ['label' => 'Organisatienaam', 'name'=> 'name', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form_required', ['label' => 'Stad', 'name'=> 'city', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form_required', ['label' => 'Straat', 'name'=> 'street', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form_required', ['label' => 'Huisnummer', 'name'=> 'housenumber', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form_required', ['label' => 'Postcode', 'name'=> 'zipcode', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form_required', ['label' => 'Email', 'name'=> 'email', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form', ['label' => 'Factuur per post', 'name'=> 'paper_invoice', 'type'=> 'checkbox', 'value' => '1'])
      @include('shared.form_required', ['label' => 'Organisatiekleur', 'name'=> 'color', 'type'=> 'color'])
      @include('shared.form_required', ['label' => 'Tekstkleur', 'name'=> 'fontcolor', 'type'=> 'color'])
      
      @include('shared.form_required', ['label' => 'Weblink', 'name'=> 'link', 'type'=> 'text',
      'class' => 'form-control'])
      @include('shared.form', ['label' => 'Cursus afbeelding', 'name' => 'media', 'type' => 'file',
      'class' => ''])
      {{ csrf_field() }}
      @include('shared.submit_button')
  </form>
@stop