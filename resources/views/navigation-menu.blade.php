<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom" style="font-family: Roboto;box-shadow:0px 0px 13px rgba(0,0,0,.5);">
    <div class="container d-flex">
        <!-- Logo -->
        <a class="navbar-brand me-4 d-flex align-items-center gap-md-1 fw-bold fs-4" style="font-family:'FJalla One' !important;" href="/">
            <x-jet-application-mark/>
            <span class="d-none d-md-inline">Valium</span>
        </a>
        <div class="d-block d-md-none ms-auto">
            <a href=""><i class="fas fa-shopping-cart fs-3 me-3" style="color:#392C70;"></i></a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
                <ul class="navbar-nav me-auto d-block d-md-none">
                    <x-jet-nav-link href="{{ route('register') }}" class="p-2" style="color:#392C70 !important;">
                        {{ __('Register') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('login') }}" class="p-2" style="color:#392C70 !important;">
                        {{ __('Log in') }}
                    </x-jet-nav-link>
                    <div class="border-bottom" style="border-color:#CCC;">
                    </div>
                </ul>
            @endguest
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-jet-nav-link href="/" class="{{request()->routeIs('index') ? 'actived' : ''}}">
                    {{ __('Inicio') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{route('courses')}}" class="{{request()->routeIs('courses') ? 'actived' : ''}}">
                    {{ __('Cursos') }}
                </x-jet-nav-link>
                @auth
                    <x-jet-nav-link href="{{ route('profile.show') }}" class="d-md-none">
                        <img class="rounded-circle" width="45" height="45" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        {{ __('Perfil') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{route('students.index')}}">
                        {{ __('Mi Aprendisaje') }}
                    </x-jet-nav-link>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto d-flex align-items-md-center">
                <x-jet-nav-link href="/">
                    {{ __('Desarrolador') }}
                </x-jet-nav-link>
                <x-jet-nav-link href="{{route('teacher.courses.index')}}">
                    {{ __('Instructor') }}
                </x-jet-nav-link>
                @auth
                    <x-jet-nav-link href="{{route('admin.index')}}">
                        {{ __('Administrador') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="d-md-none">
                        {{ __('Cerrar Sesión') }}
                    </x-jet-nav-link>
                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                        @csrf
                    </form>
                @endauth
                <x-jet-nav-link href="/" title="Carrito de Compras" class="d-none d-md-block">
                    <i class="fas fa-shopping-cart fs-3" style="color:#392C70;"></i>
                </x-jet-nav-link>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav align-items-baseline">
                <!-- Teams Dropdown -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <x-jet-dropdown id="teamManagementDropdown">
                        <x-slot name="trigger">
                            {{ Auth::user()->currentTeam->name }}

                            <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Team Management -->
                            <h6 class="dropdown-header">
                                {{ __('Manage Team') }}
                            </h6>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <hr class="dropdown-divider">

                            <!-- Team Switcher -->
                            <h6 class="dropdown-header">
                                {{ __('Switch Teams') }}
                            </h6>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach
                        </x-slot>
                    </x-jet-dropdown>
                @endif

                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown" class="d-none d-md-block">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="45" height="45" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                            @else
                                {{ Auth::user()->name }}

                                <svg class="ms-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Administrar Cuenta') }}
                            </h6>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    <div class="d-flex gap-md-1 flex-column flex-md-row">
                        <a href="{{ route('login') }}" class="btn d-none d-md-block" style="border-color:#392C70;color:#392C70;">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="ms-4 btn text-light d-none d-md-block" style="background-color:#392C70;margin-left:0 !important;">Registrase</a>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>