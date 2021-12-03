<div class="" id="hero" style="background-image: url('{{asset('images/teacher.jpg')}}');background-size:cover;">
    <div class="w-100 h-100" style="background-color:hsla(0, 0%, 0%, 0.5);">
        @include('teachers.partials.navigation')
        <div class="text-light py-3 d-flex justify-content-center flex-column" style="font-family: 'Open Sans';min-height:290px !important;">
            <h2 class="text-center mb-3 w-75 mx-auto">Tu carrera como instructor puede mejorar, recuerda que deben ofrecer un contenido de calidad</h2>
            <h5 class="text-center mb-4 w-75 mx-auto">Si deseas tener mas visitas e inscritos en tus cursos siempre puedes actualizar tu contenido para que se considere el curso como destacado</h5>
            <div class="text-center">
                <a class="btn py-2 text-decoration-none text-light" style="border:1px solid white;" href="#aprendizaje">{{__("Mis cursos")}}</a>
                <a class="btn py-2" style="background-color: white;color:black;" href="{{route('courses')}}">{{__("Mis estudiantes")}}</a>
            </div>
        </div>
    </div>
</div>