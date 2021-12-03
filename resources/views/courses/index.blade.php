<x-app-layout>
    {{-- HERO SECTION --}}
    <x-slot name="hero">
        <div class="row gap-0 m-0 p-0" style="background-image: url({{asset('images/back5.jpg')}});background-repeat:no-repeat;background-size:cover;font-family:'Open sans';" id="hero">
            <div class="col-12 col-sm-10 col-md-9 col-lg-8 d-flex justify-content-center flex-column px-5 text-center text-md-start">
                <h1 class="text-light display-6 fw-bold">Los mejores cursos en español para aprender a nivel profesional</h1>
                <p class="text-light fs-4" style="">Más que cursos online, somos educación profesional efectiva. Impulsa tu proceso
                    de apredizaje con nosotros.</p>
                @livewire('search-courses')
            </div>
        </div>
    </x-slot>   
    {{-- COUSES WITH FILTERS--}}
    @livewire('course-filters')

    {{-- FEATURED TEACHERS --}}
    <section class="container" style="font-family: 'Open Sans'">
        <h1 class="display-6 fw-bold mx-3 mx-sm-0" style="font-family: Roboto;">Conoce a algunos de nuestros instructores destacados</h1>
        <p class="fs-5 mx-3 mx-sm-0">
            Te invitamos a visitar el perfil de nuestros introductores y adquirir los cursos que mas te
            interesen
        </p>
        <div class="swiper" style="">
            <div class="swiper-wrapper">
                @foreach ($teachers as $teacher)
                    <div class="swiper-slide" >
                        <div class="p-2" >
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{Storage::url($teacher->profile_photo_path)}}" style="border-radius: 50%;width:200px;height:200px;object-fit:cover;" alt="">
                            </div>
                            <div class="mt-2 text-center">
                                <h4 class=""><a href="#" class="text-decoration-none author-card-name">{{$teacher->name}}</a></h4>
                                <p class="my-1 fs-5">{{$teacher->students_count}} Estudiantes</p>
                                <div class="d-flex justify-content-center my-0 align-items-center">
                                    <ul class="list-unstyled d-flex gap-1 mb-0 me-2">
                                        <li><i class="fas fa-star" style="{{ $teacher->reviews_avg>=1 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                                        <li><i class="fas fa-star" style="{{ $teacher->reviews_avg>=2 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                                        <li><i class="fas fa-star" style="{{ $teacher->reviews_avg>=3 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                                        <li><i class="fas fa-star" style="{{ $teacher->reviews_avg>=4 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                                        <li><i class="fas fa-star" style="{{ $teacher->reviews_avg>=5 ? 'color:yellow;' : 'color:#ccc' }}"></i></li>
                                    </ul>
                                    <span class="fs-5">({{$teacher->reviews_avg}})</span>
                                </div>
                                <p class="text-desborded mt-1 mb-4">Soy docente con más de 20 años de experiencia, me dedico a la creación de aplicaciones web con tecnologías actuales.</p>
                            </div>
                        </div>
                    </div>                    
                @endforeach
            </div>
            {{-- Navigation Buttons --}}
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            {{-- Add Pagination --}}
            <div class="swiper-pagination"></div>
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
    @push('scripts')
        <script type="module">
            let alto = window.innerHeight-77;
            document.getElementById('hero').style.height=`${alto}px`;
            var swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 25,
            breakpoints: {
                //when window width is >= 0px
                0: {
                    slidesPerView: 1,
                    spaceBetween: 10    
                },
                // when window width is >= 576px
                576: {
                slidesPerView: 2,
                spaceBetween: 20
                },
                // when window width is >= 768px
                768: {
                slidesPerView: 3,
                spaceBetween: 30
                },
                // when window width is >= 992px
                992: {
                slidesPerView: 4,
                spaceBetween: 40
                }
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            freeMode: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            });
        </script>
    @endpush
</x-app-layout>