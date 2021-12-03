@extends('adminlte::page')
@section('title', 'Valium Academy')

@section('content_header')
    <h1>{{__("Precios")}}</h1>
@stop

@section('content')
    @if (session('success'))
        <span style="margin-top:65px !important;" class="text-light position-fixed top-0 mt-3 end-0 me-4 bg-success px-2 py-3 rounded fs-5"><i class="fas fa-check-circle"></i> {{session('success')}}</span>
    @endif
    {{-- Buttons --}}
    <div class="d-flex gap-2 justify-content-end">
        <a class="btn btn-danger text-light mb-3" href="{{route('admin.prices.create')}}"><i class="fas fa-plus"></i> Crear precio</a>
    </div>
    {{-- LESSONS --}}
    <div class="table-responsive mx-auto" style="max-width: 95%;font-family:sans-serif;background-color: white !important;">
        <table class="table table-hover text-center">
            <tr class="bg-light">
                <th class="p-3">{{__("Id")}}</th>
                <th class="p-3">{{__("Nombre")}}</th>
                <th class="p-3">{{__("Monto")}}</th>
                <th class="p-3">{{__("Cursos")}}</th>
                <th class="p-3" style="min-width: max-content;">{{__("Creación")}}</th>
                <th class="p-3">{{__("Acciones")}}</th>
            </tr>
            @foreach ($prices as $price)
                <tr >
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{$price->name}}</td>
                    <td>{{$price->mount}}</td>
                    <td>{{$price->courses->count()}}</td>
                    <td style="min-width:110px;">{{$price->created_at->diffForHumans()}}</td>
                    <td class="text-center">
                        <a href="{{route('admin.prices.edit',$price)}}" class="mr-2 text-success text-decoration-none" title="Editar"><i class="fas fa-pen"></i></a>
                        <a onclick="document.getElementById('form-{{$loop->iteration}}').submit();" class="text-danger text-decoration-none" title="Eliminar" style="cursor: pointer;"><i class="fas fa-trash"></i></a>
                        <form action="{{route('admin.prices.destroy',$price)}}" method="post" id="form-{{$loop->iteration}}">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                </tr>    
            @endforeach
        </table>
    </div>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    {{-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css')}}">--}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
@stop

@section('js')
@stop



{{-- @extends('adminlte::auth.login') --}}

{{-- @extends('adminlte::auth.register') --}}
{{-- @extends('adminlte::auth.verify') --}}
{{-- @extends('adminlte::auth.passwords.confirm') --}}
{{-- @extends('adminlte::auth.passwords.email') --}}
{{-- @extends('adminlte::auth.passwords.reset') --}}
