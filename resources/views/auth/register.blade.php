@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="container contact-form">
                    @include('shared.form_title', ['title' => "Account registreren"])
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    @include('shared.form_required', ['label' => 'Voornaam', 'name'=> 'firstname', 'type'=> 'text', 'class' => 'form-control'])
                    @include('shared.form',          ['label' => 'Tussenvoegsel', 'name'=> 'insertion', 'type'=> 'text', 'class' => 'form-control'])
                    @include('shared.form_required', ['label' => 'Achternaam', 'name'=> 'lastname', 'type'=> 'text', 'class' => 'form-control'])
                    @include('shared.form_required', ['label' => 'Email', 'name'=> 'email', 'type'=> 'email', 'class' => 'form-control'])
                    @include('shared.form_required', ['label' => 'Wachtwoord', 'name'=> 'password', 'type'=> 'password', 'class' => 'form-control'])
                    @include('shared.form_required', ['label' => 'Wachtwoord bevestigen', 'name'=> 'password_confirmation', 'type'=> 'password', 'class' => 'form-control'])
                    @include('shared.submit_button', ['value' => 'Registreer'])
                    @include('shared.error')
                </form>
            </div>
        </div>
    </div>
@endsection
