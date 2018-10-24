<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="">
  <div class="container">
    <!-- Todo: Make img a variable -->
    <img src="">
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
            <a class="nav-link" href="{{ route('login') }}" style="color: {{ "white" }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}" style="color: {{ "white" }}">{{ __('Register') }}</a>
          </li>
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" style="" class="nav-link dropdown-toggle" href="#" role="button"
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
            <a href="{{ url('/home') }}" style="" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/course') }}" style="" class="nav-link">Cursussen</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/forum') }}" style="" class="nav-link">Forum</a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>