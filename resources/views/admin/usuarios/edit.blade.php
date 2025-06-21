@extends('adminlte::page')


@section('content_header')
    <div class="card-header bg-primary text-white">
        <h4><i class="fas fa-edit"></i> Modificar datos del usuario</h4>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llena los datos del formulario</h3>


                </div>
                <div class="card-body">
                    <form action="{{url('admin/usuarios', $usuario->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Rol</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                <select name="rol" id="" class="form-control">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->name}}" {{$role->name == $usuario->roles->pluck('name')->implode(',') ? 'selected':''}}>{{$role->name}}</option>

                                                    @endforeach
                                                </select>

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
                                            <label for="">Nombre del usuarios</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$usuario->name}}" name="name" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('name')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control"  value="{{$usuario->email}}" name="email" placeholder="Escriba aqui..." required>

                                            </div>
                                            @error('email')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Contraseña</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password" placeholder="Escriba aqui...">

                                            </div>
                                            @error('password')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Repetir contraseña</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" name="password_confirmation" placeholder="Escriba aqui...">

                                            </div>
                                            @error('password_confirmation')
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
                                    <a href="{{url('/admin/usuarios')}}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>  Cancelar</a>
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


