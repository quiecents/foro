@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-sm">
    <p>Welcome to this beautiful admin panel.</p>

    @include('admin.users.components.update-user-form')

</div>
</div>
@stop

@section('css')
@stop

@section('js')
    @livewireScripts
@stop