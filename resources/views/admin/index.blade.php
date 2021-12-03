@extends('adminlte::page')
@section('title', 'Valium Academy')

@section('content_header')
    <h1>Admin</h1>
@stop

@section('content')
    <p>Welcome to this beautiful admin panel.</p>
    'active' => ['admin/categories*'],
    'can'   => 'admin.categories.index',
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop



{{-- @extends('adminlte::auth.login') --}}

{{-- @extends('adminlte::auth.register') --}}
{{-- @extends('adminlte::auth.verify') --}}
{{-- @extends('adminlte::auth.passwords.confirm') --}}
{{-- @extends('adminlte::auth.passwords.email') --}}
{{-- @extends('adminlte::auth.passwords.reset') --}}
