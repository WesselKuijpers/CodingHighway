@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="flex-center position-ref full-height">
      <h2 class="text-center pt-1 pb-3">{{env('APP_NAME')}}</h2>

      <div class="row">
        <div class="main-text-block col-11 ml-3" style="background-color: #FAC275">
          <h5 class="text-center font-weight-bold pt-3">Programmeren voor iedereen!</h5>
          <p class="pt-2">
            Programmeren voor iedereen. Wie wil er allemaal leren programmeren? Wie kan er allemaal leren programmeren? Nogmaals programmeren voor iedereen. Elke student/leerling die wil leren hoe je iets voor elkaar krijgt met programmeercode moet hier zijn.  
          </p>
        </div>
      </div>

      <div class="row">
        <div class="col-11 ml-3">
          <div class="row mt-3">

            <div class="side-block col-6" style="background-color: #009BDC">
              <h5 class="text-center font-weight-bold pt-3">Aan de slag met de cursussen</h5>
              <p class="pt-2">
                Kun je niet wachten om te beginnen met een cursus? <a href="/course" class="text-white">Bezoek</a> dan
                onze cursus pagina!
              </p>
            </div>

            <div class="side-block col-6 ml-auto" style="background-color: #009BDC">
              <h5 class="text-center font-weight-bold pt-3">Stel een vraag</h5>
              <p class="pt-2">
                Heb je een vraag over één van de opdrachten of lessen? Stel deze dan gerust <a href="/forum"
                                                                                               class="text-white">hier</a>.
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
