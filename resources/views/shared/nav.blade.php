<nav class="navbar navbar-expand-md navbar-light navbar-laravel nav-organisation">
  <div class="container">

    <a href="@if(Auth::user() && !empty(Auth::user()->organisation())) {{ Auth::user()->organisation()->link }} @else / @endif">
      <img src="@if(Auth::user() && !empty(Auth::user()->organisation()->media)) {{ Auth::user()->organisation()->media->content }} @endif" class="navbar-brand nav-logo pl-3">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto">

      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->getFullname() }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('UserEdit') }}" >
                Wijzig mijn gegevens
              </a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                {{-- __('Logout') --}} Uitloggen
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          <li class="nav-item">
            <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/course') }}" class="nav-link">Cursussen</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/forum') }}" class="nav-link">Forum</a>
          </li>
          @if(Auth::user()->hasRole('admin') && Auth::user()->organisation() != null)
            <li class="nav-item">
              <a href="{{ route('organisation.show', ['id' => Auth::user()->organisation()->id]) }}" class="nav-link">{{ Auth::user()->organisation()->name }}</a>
            </li>
          @elseif(Auth::user()->organisation() == null)
            <li>
              <a href="{{ route('organisation.create') }}" class="nav-link">Organisatie aanvraag</a>
            </li>
          @endif
        @endguest
      </ul>
    </div>
  </div>
</nav>
