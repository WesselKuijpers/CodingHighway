@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="flex-center position-ref full-height">
      <h2 class="text-center pt-1 pb-3">{{env('APP_NAME')}}</h2>

      <div class="row">
        <div class="main-text-block">
          <h5 class="text-center font-weight-bold pt-3">Programmeren voor iedereen!</h5>
          <p class="p-3">
            Programmeren voor iedereen. Wie wil er allemaal leren programmeren? Wie kan er allemaal leren programmeren?
            Nogmaals programmeren voor iedereen. Elke student/leerling die wil leren hoe je iets voor elkaar krijgt met
            programmeercode moet hier zijn.
          </p>
        </div>
      </div>

      <div class="row">
            @if(Module::find('Course')->enabled())
            <div class="side-block col-sm-12 col-md-5" id="left-block">
              <h5 class="text-center font-weight-bold pt-3">Aan de slag met de cursussen</h5>
              <p class="pt-2">
                Kun je niet wachten om te beginnen met een cursus? <a href="/course">Bezoek</a> dan
                onze cursus pagina!
              </p>
            </div>

            @endif
            {{--@if(Module::find('Forum')->enabled())--}}
              <div class="side-block col-sm-12 col-md-5 offset-md-2" id="right-block">
                <h5 class="text-center font-weight-bold pt-3">Stel een vraag</h5>
                <p class="pt-2">
                  Heb je een vraag over één van de opdrachten of lessen? Stel deze dan gerust
                  <a href="/forum">hier</a>.
                </p>
              </div>
              {{--@endif--}}
        </div>

      </div>
    </div>
  </div>
@endsection
