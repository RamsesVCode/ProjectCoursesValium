<x-guest-layout>
    <div class="row m-0"  id="ventana">
        <div class="col-lg-6 col-12 column mt-sm-4" style="padding:0 150px;">
            <div style="min-width:300px;" class="column1">
                <h1 class="d-flex mt-1 mt-sm-5 mb-4 align-items-center fs-4 fw-bold" style="font-family:'FJalla One'"><img src="{{asset('images/logo.png')}}" width="45px" height="45px"/>Valium</h1>
                <h2 style="font-family: Roboto;" class="fw-bold">Bienvenido de regreso!</h2>
                <h3 style="font-family: Roboto;" class="fs-5 mb-3">Estamos felices de verte nuevamente!</h3>
                @if (session('status'))
                    <div class="alert alert-success mb-3 rounded-0" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <div class="mb-3 fs-6">
                        <label for="" class="form-label">Correo Electrónico</label>
                        <div class="d-flex border rounded-1 p-1" style="height:50px; border-color:#CCC;">
                            <i class="fas fa-envelope-open fs-5 d-flex justify-content-center align-items-center" style="color:#392C70; width:30px;"></i>
                            <input class="bg-transparent border-0 outline-none" value="{{old('email')}}" placeholder="Correo Electrónico" type="email" name="email" style="outline:none !important;padding-left:10px;width:100%;">
                        </div>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3 fs-6">
                        <label for="" class="form-label">Contraseña</label>
                        <div class="d-flex border rounded-1 p-1" style="height:50px; border-color:#CCC;">
                            <i class="fas fa-lock fs-5 d-flex justify-content-center align-items-center" style="color:#392C70; width:30px;"></i>
                            <input class="bg-transparent border-0 outline-none" placeholder="Contraseña" type="password" name="password" style="outline:none !important;padding-left:10px;width:100%;">
                        </div>
                        @error('password')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        @if (Route::has('password.request'))
                        <div>
                            <input type="checkbox" name="remember">
                            {{__("Recordarme")}}
                        </div>
                        @endif
                        <a href="{{route('password.request')}}" class="no-underline" style="color:black;">¿Olvidaste tu contraseña?</a>
                    </div>
                    <input type="submit" class="btn text-light fs-4 mb-3" style="background-color:#392C70;width:100%;" value="Iniciar Sesión">
                </form>
                <div class="d-flex gap-2 mb-3">
                    <button class="btn py-2 fs-5 text-light flex-1" style="background-color:#2d4278"><i class="fab fa-facebook-f"></i> Facebook</button>
                    <button class="btn py-2 fs-5 text-light flex-1" style="background-color:#dc4a38;"><i class="fab fa-google"></i> Google</button>
                </div>
                <p class="text-center fs-5" style="color:#392C70;">{{__("No tienes una cuenta?")}} <a href="{{'register'}}" class="text-decoration-none">Crear</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-12 d-flex align-items-end" style="background-image:url({{asset("images/login.jpg")}});background-position:cover;">
            <p class="text-light text-center col-12 fs-5">Todos los Derechos Reservados Copyright &copy; 2021</p>
        </div>
    </div>
</x-guest-layout>
    

