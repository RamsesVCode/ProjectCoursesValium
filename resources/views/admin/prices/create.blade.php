@extends('adminlte::page')
@section('title', 'Valium Academy')

@section('content_header')
    <h1>{{__("Creación de Precio")}}</h1>
@stop

@section('content')
    <div class="row mx-2" style="font-family: 'Open Sans'">
        <div class="col-6">
            {!! Form::open(['route'=>'admin.prices.store','method'=>'POST']) !!}
                @include('admin.prices.partials.form')
                {!! Form::submit('Guardar', ['class'=>'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet"> 
@stop

@section('js')
<script>
    // document.getElementById('mount').addEventListener('onchange',(event)=>{
    //     document.getElementById('name').value = event.target.value;
    // });
</script>
@stop
