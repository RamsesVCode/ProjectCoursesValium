<x-app-layout>
    {{-- HERO SECTION --}}
    <x-slot name="hero">
        <div class="row p-0 m-0" style="font-family:'Open Sans';">
            <div class="col-md-5 col-12 order-1 order-md-0 row m-0">
                <div class="card mx-auto mx-md-0 p-4 mt-md-5 ms-md-5 col-10" style="background-color:white;min-width:320px;box-shadow:0 1px 7px -2px rgba(0,0,0,.5);height:max-content;">
                    <h1 class="text-center fw-bold">La mejor plataforma de aprendizaje</h1>
                    <ul class="list-unstyled fs-5">
                        <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle fs-3 me-2" style="color:#392C70;"></i> Los mejores instructores</li>
                        <li class="d-flex align-items-center mb-2"><i class="fas fa-check-circle fs-3 me-2" style="color:#392C70;"></i>Los mejores precios</li>
                        <li class="d-flex align-items-center"><i class="fas fa-check-circle fs-3 me-2" style="color:#392C70;"></i>Los mejores cursos</li>
                    </ul>
                    <p class="fs-4 fw-bold">¿Que quieres aprender?</p>
                    <div class="input-focus">
                        <i class="fas fa-search"></i>
                        <input type="text" placeholder="Buscar curso">
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-12 order-0 order-md-1 row">
                <figure class="mt-4 col-4 col-md-6 offset-5 offset-md-3" style="min-width:227px;max-width:350px">
                    <img src="{{asset('images/heroe.png')}}" width="100%" class="d-block" alt="imagen heroe" style="object-fit: cover;">
                </figure>
            </div>
        </div>
    </x-slot>
    {{-- CATEGORIES SECTION WITH LIVEWIRE--}}
    @livewire('courses-category')

    {{-- FEATURED SECTION --}}
    <section id="featured" class="row">
        <h2 class="display-6 fw-bold mb-2 mb-md-0 mt-2" style="font-family:Roboto">Cursos destacados</h2>
        <div>
            <div class="p-0 p-md-3 row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-2">
                @forelse ($courses as $course)
                    <div class="col mx-auto mx-sm-0">
                        <x-course-card :course="$course"/>
                    </div>
                @empty
                    <div class="alert alert-danger">
                        No hay cursos destacados por el momento
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    {{-- TEACHER FORM SECTION --}}
    <section id="teacher" >
        <div class="row p-0 m-0" style="font-family:'Open Sans';">
            <div class="col-md-6 col-12 row position-relative">
                <figure class="mt-0 col-4 col-md-10 offset-4 offset-md-2 position-relative" style="min-width:227px;max-width:500px;z-index:1;">
                    <img src="{{asset('images/teacher3.png')}}" width="100%" class="d-block" alt="imagen heroe" style="object-fit: cover;">
                </figure>
                <div style="height:70%;z-index:0;background-color:#73d8ba;" class="col-10 position-absolute bottom-0 end-0"></div>
            </div>
            <div class="col-md-6 col-12 row d-flex align-items-center ms-2">
                <div class="mx-auto mx-md-0 p-4 ms-md-5 col-10" style="background-color:white;min-width:320px;height:max-content;">
                    <h1 class="text-center fw-bold">Comienza tu carrera como instructor</h1>
                    <p class="fs-5">Actualmente muchos de nuestros usuarios optan por ser instructores. 
                        Nuestra plataforma te brinda todas las herramientas necesarias
                        para enseñar lo que mas te apasiona.</p>
                        <a href="#" class="btn btn-show-course d-block mx-auto bg-valium-inactive fs-5 " style="width:max-content;">Comenzar <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    {{-- <x-jet-welcome /> --}}
</x-app-layout>