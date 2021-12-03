@extends('adminlte::page')
@section('title', 'Valium Academy')

@section('content_header')
    <h1>{{__("Usuarios")}}</h1>
@stop

@section('content')
    @livewire('admin.courses-search')
@stop

@section('css')
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Open+Sans:wght@300&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
@stop

@section('js')
    {{-- <script type="module">
            import Swal from '`~sweetalert2/dist/sweetalert2.js';
            Swal.fire({
                title: '¿Estás seguro?',
                text: "¡No podrás revertir esto!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, borrar esto!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('teacher.courses-teacher','delete',courseId);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });
    </script> --}}
@stop