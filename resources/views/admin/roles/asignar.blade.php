@extends('adminlte::page')


@section('content_header')
<div class="card-header bg-primary text-white">
        <h4><i class="fas fa-user-tag"></i> Asignar permisos al {{$rol->name}}</h4>
    </div>
    
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llena los datos del formulario</h3>


                </div>
                <div class="card-body">
                    <form action="{{url('admin/roles/asignar',$rol->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    @foreach($permisos as $modulo => $grupoPermisos)
                                        <div class="col-md-4">
                                            <h3>{{$modulo}}</h3>
                                            @foreach($grupoPermisos as $permiso)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" name="permisos[]" value="{{$permiso->id}}"
                                                    {{$rol->hasPermissionTo($permiso->name) ? 'checked': ''}}>
                                                    <label for="" class="form-check-label">{{$permiso->name}}</label>
                                                </div>
                                            @endforeach
                                            <br>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/roles')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-plus-circle"></i> Registrar</button>
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
