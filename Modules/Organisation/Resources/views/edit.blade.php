@extends('layouts.app')

@section('content')
  @include('shared.form_title', ['title' => "Pas je organisatie aan"])
  @include('shared.error')
  <form method="POST" action="{{ route('organisation.update', ['id' => $organisation->id]) }}"
        enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <input type="hidden" name="id" value="{{ $organisation->id }}">
    <input type="hidden" name="paper_invoice" value="0">

    @include('shared.form_required', ['label' => 'Organisatienaam', 'name'=> 'name', 'type'=> 'text','class' => 'form-control', 'value' => $organisation->name])
    @include('shared.form_required', ['label' => 'Stad', 'name'=> 'city', 'type'=> 'text','class' => 'form-control', 'value' => $organisation->city])
    @include('shared.form_required', ['label' => 'Straat', 'name'=> 'street', 'type'=> 'text', 'class' => 'form-control', 'value' => $organisation->street])
    @include('shared.form_required', ['label' => 'Huisnummer', 'name'=> 'housenumber', 'type'=> 'text', 'class' => 'form-control', 'value' => $organisation->housenumber])
    @include('shared.form_required', ['label' => 'Postcode', 'name'=> 'zipcode', 'type'=> 'text', 'class' => 'form-control', 'value' => $organisation->zipcode])
    @include('shared.form_required', ['label' => 'Email', 'name'=> 'email', 'type'=> 'email', 'class' => 'form-control', 'value' => $organisation->email])
    @include('shared.form_required', ['label' => 'Telefoonnummer', 'name'=> 'phone', 'type'=> 'phone', 'class' => 'form-control', 'value' => $organisation->phone])
    @include('shared.form', ['label' => 'Factuur per post', 'name'=> 'paper_invoice', 'type'=> 'checkbox', 'value' => $organisation->paper_invoice])
    @include('shared.form_required', ['label' => 'Organisatiekleur', 'name'=> 'color', 'type'=> 'color', 'value' => $organisation->color])
    @include('shared.form_required', ['label' => 'Tekstkleur', 'name'=> 'fontcolor', 'type'=> 'color', 'value' => $organisation->fontcolor])

    @include('shared.form_required', ['label' => 'Weblink', 'name'=> 'link', 'type'=> 'text',
    'class' => 'form-control', 'value' => $organisation->link])
    @include('shared.form', ['label' => 'Logo', 'name' => 'media', 'type' => 'file',
    'class' => ''])
    @include('shared.submit_button')
  </form>
@stop