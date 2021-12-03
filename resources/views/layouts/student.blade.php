<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css')}}">

        {{-- Icon Fonts --}}
        <link rel="stylesheet" href="{{asset('css/bootstrap-icons.css')}}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/swiper-bundle.min.js')}}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stringToSlug.min.js') }}"></script>
        {{-- <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script> --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>

        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-light" style="position: relative;min-width:380px !important;background-color: #ffffff !important;">
        {{-- <x-jet-banner /> --}}

        <!-- Page Heading -->
        @isset ($hero)
            <section class="">
                {{ $hero }}
            </section>
        @endif
        <!-- Page Content -->
        <main class="">
            {{ $slot }}
        </main>
        <footer class="bg-dark position-relative" style="font-family:Roboto;height:min-content;bottom:-16px;width:100%;">
            <div class="container row">
                <div class="col-3 p-4 pb-0">
                    <ul class="list-unstyled fs-5" style="line-height: 1.7rem;">
                        <li><a href="#" class="text-light text-decoration-none">Quieren somos</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Enseñar en valium</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Preguntas precuentes</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Contactos</a></li>
                    </ul>
                </div>
                <div class="col-3 p-4 pb-0">
                    <ul class="list-unstyled fs-5" style="line-height: 1.7rem;">
                        <li><a href="#" class="text-light text-decoration-none">Nuestros servicios</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Terminos y condiciones</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Politicas de uso</a></li>
                    </ul>
                </div>
                <div class="col-3 p-4 pb-0">
                    <ul class="list-unstyled fs-5" style="line-height: 1.7rem;">
                        <li><a href="#" class="text-light text-decoration-none">Mapa del sitio</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Manual y usabilidad</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Desarrollador</a></li>
                        <li><a href="#" class="text-light text-decoration-none">Reportar algun problema</a></li>
                    </ul>
                </div>
                <div class="col-3 p-4 pb-0">
                    <h5 class="text-light">También nos encontramos en</h5>
                    <ul class="list-unstyled fs-5" style="line-height: 1.9rem;">
                        <li><a href="https://www.instagram.com" class="text-light text-decoration-none"><i class="fab fa-instagram" style="color: #73d8ba;"></i> <span class="text-decoration-underline">Instagram</span></a></li>
                        <li><a href="https://www.facebook.com" class="text-light text-decoration-none" ><i class="fab fa-facebook" style="color: #73d8ba;"></i> <span class="text-decoration-underline">Facebook</span></a></li>
                        <li><a href="https://www.twitter.com" class="text-light text-decoration-none"><i class="fab fa-twitter" style="color: #73d8ba;"></i> <span class="text-decoration-underline">Twitter</span></a></li>
                        <li><a href="#" class="text-light text-decoration-none"><i class="fab fa-telegram" style="color: #73d8ba;"></i> <span class="text-decoration-underline">Telegram</span> <small>(Pronto)</small></a></li>
                    </ul>
                </div>
            </div>
            <p class="text-light text-end me-5 pe-5 fs-5 pb-2">DarkMaster 2021 &copy; Todos los derechos reservados</p>
        </footer>
        @stack('modals')

        @livewireScripts
        
        @stack('scripts')
    </body>
</html>
