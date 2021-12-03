<x-guest-layout>
    <div class="row m-0"  id="ventana">
        <div class="col-lg-6 col-12 column" style="padding:0 150px;">
            <div style="min-width:300px;" class="column1">
                <h1 class="d-flex mt-sm-5 align-items-center fs-4 fw-bold" style="font-family:'FJalla One'"><img src="{{asset('images/logo.png')}}" width="45px" height="45px"/>Valium</h1>
                <h2 style="font-family: Roboto;" class="fw-bold">¿Nuevo aqui?</h2>
                <h3 style="font-family: Roboto;" class="fs-5 mb-3">Unete hoy! Avanza paso a paso</h3>
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-3 fs-6">
                        <label for="" class="form-label">Nombre Completo</label>
                        <div class="d-flex border rounded-1 p-1" style="height:50px; border-color:#CCC;">
                            <i class="fas fa-user fs-5 d-flex justify-content-center align-items-center" style="color:#392C70; width:30px;"></i>
                            <input class="bg-transparent border-0 outline-none" value="{{old('name')}}" placeholder="Nombre completo" type="text" name="name" style="outline:none !important;padding-left:10px;width:100%;">
                        </div>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
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
                    <div class="mb-3 fs-6">
                        <label for="" class="form-label">Confirmar</label>
                        <div class="d-flex border rounded-1 p-1" style="height:50px; border-color:#CCC;">
                            <i class="fas fa-unlock-alt fs-5 d-flex justify-content-center align-items-center" style="color:#392C70; width:30px;"></i>
                            <input class="bg-transparent border-0 outline-none" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" style="outline:none !important;padding-left:10px;width:100%;">
                        </div>
                        @error('password_confirmation')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    {{-- Boton Aceotar terminos y condiciones 
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <x-jet-checkbox id="terms" name="terms" />
                            <label class="custom-control-label" for="terms">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                            </label>
                        </div>
                    </div>
                    @endif --}}
                    <input type="submit" class="btn text-light fs-4 mb-2" style="background-color:#392C70;width:100%;" value="Registrarse">
                </form>
                <p class="text-center fs-5">Ya tienes una cuenta? <a href="{{'login'}}" class="text-decoration-none" style="color:#392C70;">Iniciar Sesión</a></p>
            </div>
        </div>
        <div class="col-lg-6 col-12 d-flex align-items-end" style="background-image:url({{asset("images/register.jpg")}});background-position:cover;">
            <p class="text-light text-center col-12 fs-5">Todos los Derechos Reservados Copyright &copy; 2021</p>
        </div>
    </div>
</x-guest-layout>
    