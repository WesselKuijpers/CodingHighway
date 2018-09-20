<nav class="navbar navbar-expand-md navbar-light navbar-laravel" style="background-color: #e61469">
    <div class="container">
        <!-- Todo: Make img a variable -->
        <img src="{{ Storage::url('img/windesheim-logo.png') }}">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
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
                        <a id="navbarDropdown" style="color: #004685" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->getFullname() }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                        <a href="{{ url('/home') }}" style="color: #004685" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/courses') }}" style="color: #004685" class="nav-link">Cursussen</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/lessons') }}" style="color: #004685" class="nav-link">Lessen</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/exercises') }}" style="color: #004685" class="nav-link">Opdrachten</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/forum') }}" style="color: #004685" class="nav-link">Forum</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>