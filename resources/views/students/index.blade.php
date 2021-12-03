<x-student>
    @push('styles')
    @endpush
    <x-slot name="hero">
        <div class="" id="hero" style="background-image: url('{{asset('images/developer.jpg')}}');background-size:cover;">
            <div class="w-100 h-100" style="background-color:hsla(0, 0%, 0%, 0.5);">
                @include('students.partials.navigation')
                <div class="text-light py-3 d-flex justify-content-center flex-column" style="font-family: 'Open Sans';height:300px !important;">
                    <h2 class="text-center mb-3 w-75 mx-auto">Con nuestros cursos de primer nivel lograrás alcanzar un grado de conocimiento increible</h2>
                    <h5 class="text-center mb-4 w-75 mx-auto">Cada año muchos de nuestro estudiantes logran encontrar trabajo gracias a nuestra enseñanza de calidad</h5>
                    <div class="text-center">
                        <a class="btn py-2 text-decoration-none text-light" style="border:1px solid white;" href="#aprendizaje">{{__("Mis cursos")}}</a>
                        <a class="btn py-2" style="background-color: white;color:black;" href="{{route('courses')}}">{{__("Buscar cursos")}}</a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <section id="header" class="bg-dark text-light py-2">
        <div class="container" id="aprendizaje">
            <h1 class="mt-4">Mi aprendizaje</h1>
            <ul class="list-unstyled d-flex gap-4 my-0 py-0 fs-5">
                <li style="cursor: pointer">Mis cursos</li>
                {{-- <li style="cursor: pointer">Certificaciones</li> --}}
                {{-- <li style="cursor: pointer">Instructores asociados</li> --}}
            </ul>
        </div>
    </section>
    <section id="body">
        <div class="container">
            @livewire('student.courses-student')
        </div>
    </section>
    @push('scripts')
    @endpush

</x-student>
