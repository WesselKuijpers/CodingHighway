<nav class="navbar navbar-expand-md navbar-light navbar-laravel nav-organisation">
  <div class="container">

    <a href="@if(Auth::user() && !empty(Auth::user()->organisation())) {{ Auth::user()->organisation()->link }} @else / @endif">
      <img src="@if(Auth::user() && !empty(Auth::user()->organisation()->media)) {{ Auth::user()->organisation()->media->content }} @endif" class="navbar-brand nav-logo pl-3">
    </a>

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation" class="navbar-toggler btn-organisation">
      <i class="fa fa-bars"></i>
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
            <a id="navbarDropdown" class="nav-link dropdown-toggle organisation-link" href="#" role="button"
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
            <a href="{{ url('/home') }}" class="nav-link organisation-link">Dashboard</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/course') }}" class="nav-link organisation-link">Cursussen</a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/forum') }}" class="nav-link organisation-link">Forum</a>
          </li>
          @if(Auth::user()->hasRole('admin') && Auth::user()->organisation() != null)
            <li class="nav-item">
              <a href="{{ route('organisation.show', ['id' => Auth::user()->organisation()->id]) }}" class="nav-link organisation-link">{{ Auth::user()->organisation()->name }}</a>
            </li>
          @elseif(Auth::user()->organisation() == null)
            <li>
              <a href="{{ route('organisation.create') }}" class="nav-link organisation-link">Organisatie aanvraag</a>
            </li>
          @endif
          @if(Auth::user()->hasPermission('module.management') || Auth::user()->hasPermission('role.show') || Auth::user()->hasPermission('roleuser.management'))
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle organisation-link" href="#" role="button"
                 data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                Management <span class="caret"></span>
              </a>
  
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @if(Auth::user()->hasPermission('role.show'))
                  <a class="dropdown-item" href="{{ route('role') }}" >
                    Rollen
                  </a>
                @endif
                @if(Auth::user()->hasPermission('roleuser.management'))
                  <a class="dropdown-item" href="{{ route('RoleUser') }}">
                    Gebruikers
                  </a>
                @endif
                @if(Auth::user()->hasPermission('module.management'))
                  <a class="dropdown-item" href="{{ route('Module') }}">
                    Modules
                  </a>
                @endif
                @if(Auth::user()->hasPermission('organisation.activate'))
                  <a class="dropdown-item" href="{{ route('organisation') }}">
                    Organisaties
                  </a>
                @endif
                @if(Auth::user()->hasPermission('course.create'))
                  <a class="dropdown-item" href="{{ route('course.create') }}">
                    Cursus aanmaken
                  </a>
                @endif
              </div>
            </li>
          @endif
          @permission('teacher.check')
            @if(Auth::user()->organisation() != null)
              <li><a class="nav-link" href="{{route('teacherCheckIndex')}}">Nakijken</a></li>
            @endif
          @endpermission
        @endguest
      </ul>
    </div>
  </div>
</nav>
