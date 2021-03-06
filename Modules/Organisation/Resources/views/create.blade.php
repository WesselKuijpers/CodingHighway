@extends('layouts.app')

@section('content')
  @include('shared.form_title', ['title' => "Vraag een organisatie aan"])
  @include('shared.error')
  <form method="POST" action="{{ route('organisation.store') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="requester" value="{{ Auth::id() }}">
    <input type="hidden" name="paper_invoice" value="0">
    @include('shared.form_required', ['label' => 'Organisatienaam', 'name'=> 'name', 'type'=> 'text','class' => 'form-control', 'value' => old('name')])
    @include('shared.form_required', ['label' => 'Straat', 'name'=> 'street', 'type'=> 'text', 'class' => 'form-control', 'value' => old('street')])
    @include('shared.form_required', ['label' => 'Huisnummer', 'name'=> 'housenumber', 'type'=> 'text', 'class' => 'form-control', 'value' => old('housenumber')])
    @include('shared.form_required', ['label' => 'Postcode', 'name'=> 'zipcode', 'type'=> 'text', 'class' => 'form-control', 'value' => old('zipcode')])
    @include('shared.form_required', ['label' => 'Stad', 'name'=> 'city', 'type'=> 'text','class' => 'form-control', 'value' => old('city')])
    @include('shared.form_required', ['label' => 'Email', 'name'=> 'email', 'type'=> 'email', 'class' => 'form-control', 'value' => old('email')])
    @include('shared.form_required', ['label' => 'Telefoonnummer', 'name'=> 'phone', 'type'=> 'phone', 'class' => 'form-control', 'value' => old('phone')])
    @include('shared.form', ['label' => 'Factuur per post', 'name'=> 'paper_invoice', 'type'=> 'checkbox', 'value' => '1'])
    @include('shared.form_required', ['label' => 'Organisatiekleur', 'name'=> 'color', 'type'=> 'color', 'value' => old('color')])
    @include('shared.form_required', ['label' => 'Tekstkleur', 'name'=> 'fontcolor', 'type'=> 'color', 'value' => old('fontcolor')])

    @include('shared.form_required', ['label' => 'Weblink', 'name'=> 'link', 'type'=> 'text',
    'class' => 'form-control', 'value' => old('link')])
    @include('shared.form', ['label' => 'Logo', 'name' => 'media', 'type' => 'file',
    'class' => ''])
    @include('shared.submit_button')
  </form>
@stop