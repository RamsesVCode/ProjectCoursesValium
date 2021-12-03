<nav class="navbar navbar-expand-md navbar-dark px-5" id="nav-student">
    <a class="navbar-brand me-4 d-flex align-items-center gap-md-1 fw-bold fs-4" style="font-family:'FJalla One' !important;" href="/">
        <x-jet-application-mark/>
        <span class="d-none d-md-inline">Valium</span>
    </a>
    <button class="navbar-toggler rounded-circle border-1 border-light outline-0" style="width:45px;height:45px;" type="button" data-bs-toggle="collapse" data-bs-target="#content" aria-controls="content" aria-expanded="false" aria-label="Toggle navigation">
        <div class="d-flex justify-content-center align-items-center">
            <span class="" style="color:white;"><i class="fas fa-bars"></i></span>
        </div>
    </button>
    <div class="collapse navbar-collapse" id="content">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="font-size: 16px;">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active">Mi Aprendizaje</a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li> --}}
            <li class="nav-item">
                <a href="#aprendizaje" class="nav-link">Mis cursos</a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link disabled">Certificaciones</a>
            </li> --}}
        </ul>
        {{-- <div> --}}
            <a href="" class="ms-auto text-light fs-4 position-relative">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute bg-danger rounded-circle" style="width:17px;height:17px;top:-5px;right:-15px;"></span>
            </a>
        {{-- </div> --}}
        <div class="dropdown">
            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:16px !important;">
                <span style="color:white !important;">{{auth()->user()->name}}</span>
                <img src="{{auth()->user()->profile_photo_url}}" width="40" height="40" class="rounded-circle" alt="">
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="max-width: max-content;">
                <li><a class="dropdown-item" href="{{ route('profile.show') }}">{{__("Perfil")}}</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.index') }}">{{__("Administrador")}}</a></li>
                <li>
                    <a class="dropdown-item" href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">{{__("Cerrar Sesión")}}</a>
                </li>
                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>