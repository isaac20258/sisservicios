@extends('adminlte::page')


@section('content_header')
    <h1><b>Configuraciones/ Datos registro </b></h1>

    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre de la institución</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->nombre}}" name="nombre" placeholder="Escriba aqui.." disabled>
                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Descripción de la institución</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->descripcion}}" name="descripcion" placeholder="Escriba aqui.." disabled>
                                            </div>

                                        </div>
                                        @error('descripcion')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror


                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->direccion}}" name="direccion" placeholder="Escriba aqui.." disabled>
                                            </div>

                                        </div>
                                        @error('direccion')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror



                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->telefono}}" name="telefono" placeholder="Escriba aqui.." disabled>
                                            </div>

                                        </div>
                                        @error('telefono')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror


                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" value="{{$configuracion->email}}" name="email" placeholder="Escriba aqui.." disabled>
                                            </div>

                                        </div>
                                        @error('email')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo">Logo</label><br><br>
                                    <img src="{{asset('storage/'.$configuracion->logo)}}" width="100px" alt="imagen">


                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/configuraciones')}}" class="btn btn-secondary">Volver</a>

                                </div>
                            </div>
                        </div>



                </div>

            </div>

        </div>


    </div>

@stop
@section('css')


@stop

@section('js')

@stop
