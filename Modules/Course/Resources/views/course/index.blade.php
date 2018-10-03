{{-- Page to show all courses --}}

{{-- Extending the layout --}}
@extends('layouts.app')

{{-- Placeholder for the page-specific content --}}
@section('content')

    {{-- Title --}}
    <h2 class="text-center page-header">Alle cursussen</h2>
        <div class="col-10 offset-1 mb-3">
            <hr>
        </div>

    <div class="row">
        {{-- Course loop --}}
        @for($i = 0; $i < 9; $i++)
            {{-- Course items --}}
            <div class="col-lg-4 col-md-3 col-sm-1">
                <a href="/course/$course->id">
                    <div class="m-2" style="color:{{"#000"}}" class="no-link">
                            <div class="card h-100 overflow-h custom-card" style="background-color: {{"#333"}}; color:{{"#fff"}};">
                                <div class="card-body text-center">
                                    <h5 class="card-title">$course->name</h5>
                                    <img class="card-img m-a h-200px w-auto" src="https://ubisafe.org/images/transparent-language-ruby.png" alt="Course logo">
                                    <p>$course->description Een omschrijving die wat informatie over de cursus geeft.</p>
                                </div>
                            </div>
                    </div>
                </a>
            </div>
        @endfor
    </div>

@endsection



