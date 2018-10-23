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
                            <div class="col-6">
                                <p class="text-center">Gebruikers</p>
                                <ul class="list-group">
                                    @for($i=0;$i<8;$i++)
                                        <li class="list-group-item float-left">Gebruiker {{$i+1}}
                                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample{{$i}}" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fas fa-chevron-down float-right" onclick="DropDownThisShit()"></i>
                                            </button>
                                        </li>
                                        <div class="collapse" id="collapseExample{{$i}}">
                                            <div class="card card-body">
                                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            </div>
                                        </div>
                                    @endfor
                                </ul>


                            </div>
                            <div class="col-6">
                                <p class="text-center">Licenties</p>
                                <form action="GET">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="license_count">
                                        <div class="col-md-6 m-auto">
                                            <input type="submit" value="Genereer" class="btn btn-primary form-control mt-2">
                                        </div>
                                    </div>
                                    @for($i=0;$i<app('request')->input('license_count'); $i++)
                                        <p>{{$i+1}}</p>
                                    @endfor
                                </form>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
