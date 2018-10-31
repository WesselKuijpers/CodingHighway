@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        Dashboard van {{ $organisation->name }}
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <p class="text-center">Gebruikers</p>
                                <ul class="list-group">
                                    @foreach($organisation->users as $user)
                                        <li class="list-group-item">{{ $user->getFullname() }}
                                            <button type="button" class="btn btn-primary float-right" data-toggle="collapse" data-target="#collapseExample{{ $user->id }}" aria-expanded="false" aria-controls="collapseExample">
                                                <i class="fas fa-chevron-down"></i>
                                            </button>
                                        </li>
                                        <div class="collapse" id="collapseExample{{ $user->id }}">
                                            <div class="card card-body">
                                                <p><strong>Email: </strong>{{ $user->email }}</p>
                                                <h4>Voortgang:</h4>
                                                @foreach($courses as $course)
                                                    <strong>{{ $course->name }}</strong>
                                                    <p>Lessen: 
                                                        <div
                                                            class="progressbar"
                                                            data-user_id="{{ $user->id }}"
                                                            data-course_id="{{ $course->id }}"
                                                            data-lessons="1"
                                                            data-token="{{ Auth::user()->api_token }}"
                                                        >
                                                        </div>
                                                    </p>
                                                    
                                                    <p>Opdrachten: 
                                                        <div
                                                            class="progressbar"
                                                            data-user_id="{{ $user->id }}"
                                                            data-course_id="{{ $course->id }}"
                                                            data-exercises="1"
                                                            data-token="{{ Auth::user()->api_token }}"
                                                        >
                                                        </div>
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>


                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <p class="text-center pt-2">Licenties</p>
                                <form action="{{ route('licenses.generate') }}" method="POST">
                                    <div class="form-group">
                                        @csrf
                                        <input type="hidden" value="{{ $organisation->id }}" name="organisation_id">
                                        <input type="number" class="form-control" name="amount">
                                        <div class="col-6 m-auto">
                                            <input type="submit" value="Genereer" class="btn btn-primary form-control mt-2">
                                        </div>
                                    </div>
                                    @if (count($organisation->licenses) != 0)
                                        @if (count($organisation->licenses->where('user_id', '!=', null)) != 0)
                                            <div class="col-md-6 m-auto">
                                                <strong class="text-center">Geactiveerde Licenties:</strong>
                                            </div>
                                            @foreach($organisation->licenses->where('user_id', '!=', null) as $license)
                                                <div class="col-12 m-auto">
                                                    <p class="text-center">
                                                        {{ $license->key }}
                                                        @if ($license->user_id != null)
                                                            <i class="fas fa-check"></i>
                                                        @endif
                                                    </p>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if (count($organisation->licenses->where('user_id', null)) != 0)
                                            <div class="col-md-6 m-auto">
                                                <strong class="text-center">Openstaande Licenties:</strong>
                                            </div>
                                            @foreach($organisation->licenses->where('user_id', null) as $license)
                                                <div class="col-12 m-auto">
                                                    <p class="text-center">
                                                        {{ $license->key }}
                                                        @if ($license->user_id != null)
                                                            <i class="fas fa-check"></i>
                                                        @endif
                                                    </p>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
