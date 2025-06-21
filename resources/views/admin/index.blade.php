@extends('adminlte::page')


@section('content_header')
<h1><b>Bienvenido</b></h1>

<hr>
@stop

@section('content')

<div class= "row">
    <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/configuraciones')}}">
                            <img src="{{url('/imagenes/ajustes.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Configuraciones registrados</b></h5>
                         {{$total_configuraciones}} confiraciones
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/roles')}}">
                            <img src="{{url('/imagenes/roles.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Roles registrados</b></h5>
                        {{$total_roles}} roles
                    </div>
                </div>
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/usuarios')}}">
                            <img src="{{url('/imagenes/usuario.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Usuarios registrados</b></h5>
                        {{$total_usuarios}} usuarios
                    </div>
                </div>
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/clientes2')}}">
                            <img src="{{url('/imagenes/clientes.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Clientes registrados</b></h5>
                        {{$total_clientes}} clientes
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/servicios')}}">
                            <img src="{{url('/imagenes/servicios.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Servicios</b></h5>
                        {{$total_servicios}} servicio
                    </div>
                </div>
            </div>
            <!-- /.info-box -->
        </div>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box zoomP" >
                <div class="row">
                    <div class="col-md-3">
                        <a href="{{url('/admin/solicitud2')}}">
                            <img src="{{url('/imagenes/pagos.gif')}}" width="100%" alt="imagen">
                        </a>
                    </div>
                    <div class="col-md-9" style="margin-top: 8px">
                        <h5><b>Pagos </b></h5>
                        {{$total_solicitud}} Pagos
                    </div>
                </div>
            </div>
            <!-- /.info-box -->
        </div>
        
    </div>
    <div class="row">
        
        

    </div>



@stop
@section('css')


@stop

@section('js')
@stop
