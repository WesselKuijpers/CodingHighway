@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        Dashboard van de organisatie OrganisatieNaam
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <p class="text-center">Gebruikers</p>
                                <ul class="list-group">
                                    @for($i=0;$i<8;$i++)
                                        <li class="list-group-item">Gebruiker {{$i+1}}
                                            <button type="button" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapseExample{{$i}}" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fas fa-chevron-down" onclick="DropDownThisShit()"></i>
                                            </button>
                                        </li>
                                        <div class="collapse" id="collapseExample{{$i}}">
                                            <div class="card card-body">
                                                <p></p>
                                            </div>
                                        </div>
                                    @endfor
                                </ul>


                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <p class="text-center pt-2">Licenties</p>
                                <form action="GET">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="license_count">
                                        <div class="col-6 m-auto">
                                            <input type="submit" value="Genereer" class="btn btn-primary form-control mt-2">
                                        </div>
                                    </div>
                                    @for($i=0;$i<app('request')->input('license_count'); $i++)
                                        <div class="col-12 m-auto">
                                            <p class="text-center">81963f35-ebdc-302d-b0fe-c36d8cf6d85e</p>
                                        </div>
                                    @endfor
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
