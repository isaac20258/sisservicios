@extends('adminlte::page')


@section('content_header')
    <div class="card shadow-lg rounded">
    <div class="card-header bg-primary text-white">
        <h4><i class="fas fa-edit"></i> Actualizar informacion del servicio</h4>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Actualiza los datos </h3>


                </div>
                <div class="card-body">
                    <form action="{{url('admin/servicios',$servicios->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del servicios</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tools"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$servicios->nombre}}" name="nombre" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Descripción</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$servicios->descripcion}}" name="descripcion" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('descripcion')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Costo</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-wallet"></i></span>
                                                </div>
                                                <input type="decimal" class="form-control" value="{{$servicios->costo}}" name="costo" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('decimal')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Estado</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-check-circle"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$servicios->estado}}" name="estado" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('estado')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/servicios')}}" class="btn btn-secondary"><i class="fas fa-times"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
                                </div>
                            </div>
                        </div>
                    </form>


                </div>

            </div>

        </div>


    </div>

@stop
@section('css')


@stop

@section('js')

@stop

