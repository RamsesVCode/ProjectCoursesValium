<x-app-layout>
    <x-slot name="hero">
        <section id="hero-show" class="bg-dark" style="background-color: #100f13 !important;">
            <div class="container">
                <div class="row text-light" style="font-family: Roboto">
                    <div class="col-12 col-lg-6 py-0 py-sm-3 px-0 px-sm-3 pe-sm-4">
                        <img src="{{Storage::url($course->image->url)}}" width="100%" style="max-height:380px" class="object-cover" alt="">
                    </div>    
                    <div class="col-12 col-lg-6 py-3 px-3 px-md-2 d-flex flex-column justify-content-center">
                        <h1 class="fw-bold">{{$course->title}}</h1>
                        <h5 class="text-desborded d-none d-md-block">{{$course->description}}</h5>
                        <h6 class="text-desborded d-block d-md-none">{{$course->description}}</h6>
                        <h6 class="my-2"><i class="fas fa-tag"></i> <span class="fw-bold">Categoria:</span> {{$course->category->name}}</h6>
                        <h6><i class="fas fa-layer-group"></i> <span class="fw-bold">Nivel :</span> {{$course->level->name}}</h6>
                        <h6 class="my-2"><i class="fas fa-globe"></i> {{__("Español")}}</h6>
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h6 class="mb-0">{{$course->average_reviews}} </h6>
                            <ul class="list-unstyled gap-1 d-flex mb-0">
                                <li><i class="fas fa-star" style="{{ $course->average_reviews>=1 ? 'color:yellow;' : '' }}font-size:12px"></i></li>
                                <li><i class="fas fa-star" style="{{ $course->average_reviews>=2 ? 'color:yellow;' : '' }}font-size:12px"></i></li>
                                <li><i class="fas fa-star" style="{{ $course->average_reviews>=3 ? 'color:yellow;' : '' }}font-size:12px"></i></li>
                                <li><i class="fas fa-star" style="{{ $course->average_reviews>=4 ? 'color:yellow;' : '' }}font-size:12px"></i></li>
                                <li><i class="fas fa-star" style="{{ $course->average_reviews>=5 ? 'color:yellow;' : '' }}font-size:12px"></i></li>
                            </ul>
                            <span class="fs-6">
                                <a href="#course-reviews">({{$course->reviews_count}} Calificaciones)</a> <span class="ms-2">{{$course->students_count}} Estudiantes</span>
                            </span>
                        </div>
                        <h6><i class="fas fa-user"></i> Creado por <a href="#">{{$course->teacher->name}}</a> el
                            {{date_format($course->created_at,'d/m/Y')}}    
                        </h6>
                        <h6 class="mt-2"><i class="fas fa-calendar-alt"></i> Se actualizó por ultima vez 
                            {{$course->updated_at->diffForHumans()}}    
                        </h6>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>
    <section id="body-course">
        <div class="container">
            <div class="row my-3">
                <div class="col-10 mx-auto col-lg-8 py-1 px-0 order-1 order-lg-0">
                    <div class="d-flex border p-3 pb-1 border rounded gap-2 flex-lg-row flex-column" style="border-color:#B5B5B5 !important;">
                        <div class="col-12 col-lg-6 pe-lg-1">
                            <h2>{{__("Requerimientos del curso")}}</h2>
                            <ul class="list-unstyled">
                                @foreach ($course->requirements as $requirement)
                                    <li style="font-size: 16px" class="d-flex gap-2 align-items-start">
                                        <i class="fas fa-check-circle pt-1" style="color:#392c70 !important;"></i> 
                                        <span class="">{{$requirement->description}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h2>{{__("Objetivos")}}</h2>
                            <ul class="list-unstyled">
                                @foreach ($course->goals as $goal)
                                    <li style="font-size: 16px" class="d-flex gap-2 align-items-start">
                                        <i class="fas fa-check-circle pt-1" style="color:#392c70 !important;"></i> 
                                        <span class="">{{$goal->description}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div id="sections-of-course row" class="mt-4">
                        <h2>Contenido del curso</h2>
                        <div class="col-12" >
                            @foreach ($course->sections as $section)
                                <div class="" id="acordeon" >
                                    <button class="w-100 py-2 px-3 text-start d-flex align-items-center justify-content-between accordion-h" type="button" data-bs-toggle="collapse" data-bs-target="#menu-{{$loop->iteration}}" id="accordion-header-{{$loop->iteration}}" style="{{!$loop->first ? 'border-top:0 !important' : ''}}" onclick="changeStateArrow(this)">
                                        <span class="">{{$section->title}}</span>
                                        <i class="bi bi-chevron-down fs-5 me-2 d-inline-block {{$loop->first ? 'animate-rotateZNeg' : ''}}" id="arrow"></i>
                                    </button>
                                    <div class="collapse {{$loop->first ? 'show' : ''}} accordion-b" id="menu-{{$loop->iteration}}" style="">
                                        <div class="p-3 py-2">
                                            
                                            @foreach ($section->lessons as $lesson)
                                                <ul class="list-unstyled m-0 p-0">
                                                    <li class="my-1 p-0 d-flex gap-2 align-items-start" style="font-size: 16px;">
                                                        <i class="far fa-play-circle mt-1" style="color:#392c70"></i>
                                                        <span class="">{{$lesson->name}}</span>
                                                        <i class="d-inline-block ms-auto me-2 fas fa-lock text-secondary" style=""></i>
                                                    </li>
                                                </ul>
                                            @endforeach              
                                            
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="cursos-relacionados" class="mt-4">
                        <h2 class="my-0 mb-1">Cursos relacionados</h2>
                        <p class="fs-5 my-0 mb-3">También tienes a tu alcance mas cursos relacionados a este. ¡Quizas alguno te interese!</p>
                        <div class="swiper" style="">
                            <div class="swiper-wrapper mb-4">
                                @foreach ($featured_courses as $f_course)
                                    <div class="swiper-slide" >
                                        <x-course-card :course="$f_course"/>
                                    </div>
                                @endforeach
                            </div>
                            {{-- Navigation Buttons --}}
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                            {{-- Add Pagination --}}
                            <div class="swiper-pagination"></div>
                        </div>
                        @if(!$featured_courses->count())
                            <div class="alert alert-danger">
                                {{__("Por el momento no hay cursos similares")}}
                            </div>
                        @endif
                    </div>
                    {{-- Reviews Component --}}
                    @livewire('course-reviews',['course'=>$course])
                </div>
                <div class="col-12 col-lg-4 order-0 order-lg-1">
                    <div class="mx-3 py-2 px-3 sticky-md-top mt-md-2 shadow row" style="background-color: white !important;margin-bottom:15px !important;">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="d-flex gap-2 align-items-center">
                                <div class="pt-2">
                                    <a href="" class="d-block"><img src="{{Storage::url($course->teacher->profile_photo_path)}}" width="55px" height="55px" class="rounded-circle" style="object-fit: cover;border:3px solid #C4C4C4 !important;" alt=""></a>
                                </div>
                                <div class=" ">
                                    <p class="fs-1 fw-bold m-0 p-0">
                                        @can('enrolled', $course)
                                            <span class="text-success">!Comprado¡</span>
                                        @else
                                            @if ($course->price->mount>0)
                                                {{$course->price->mount}} $    
                                            @else
                                                <span class="text-danger">!GRATIS¡</span>
                                            @endif
                                        @endcan
                                    </p>
                                    <p class="my-0 py-0"><a href="#" class="text-decoration-none">Prof. {{$course->teacher->name}}</a></p>
                                </div>
                            </div>
                            @can('enrolled', $course)
                                <p class="fs-5 my-1"><i class="fas fa-hand-holding-usd"></i> !Buena elección¡</p>
                            @else
                                <p class="fs-5 my-0"><i class="fas fa-hand-holding-usd"></i> ¡Precios muy accesibles!</p>
                            @endcan
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            @can('enrolled',$course)
                                <a href="{{route('courses.advance',$course)}}" class="btn btn-danger py-2 text-light fs-5" style="width:100%">Ir al curso</a>
                            @else
                                <div class="d-flex gap-1 mb-1">
                                    <a href="" class="btn btn-danger py-2 text-light fs-5" style="width:85%">
                                        @if ($course->price->mount>0)
                                            Comprar ahora    
                                        @else
                                            Llevar curso    
                                        @endif
                                    </a>
                                    <a href="" class="btn d-flex justify-content-center align-items-center text-dark border border-dark" style="width:15%;min-width:40px;" title="Ir al carrito"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                                <a href="" class="btn btn-lg w-100 btn-outline-secondary" style="">Añadir al carrito</a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            function changeStateArrow(element){
                if(!element.classList.contains('collapsed')){
                    element.children[1].classList.remove("animate-rotateZPos");
                    element.children[1].classList.add("animate-rotateZNeg");
                }else{
                    element.children[1].classList.remove("animate-rotateZNeg");
                    element.children[1].classList.add("animate-rotateZPos");
                }
            }
        </script>
        <script type="module">
            var swiper = new Swiper('.swiper', {
            slidesPerView: 1,
            spaceBetween: 25,
            breakpoints: {
                // when window width is >= 576px
                576: {
                slidesPerView: 1,
                spaceBetween: 20
                },
                // when window width is >= 768px
                768: {
                slidesPerView: 2,
                spaceBetween: 20
                },
                // when window width is >= 992px
                992: {
                slidesPerView: 3,
                spaceBetween: 10
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