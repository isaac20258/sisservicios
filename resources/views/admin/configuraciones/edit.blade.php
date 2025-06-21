@extends('adminlte::page')


@section('content_header')
    <h1><b>Configuraciones/Modificación de la configuración </b></h1>

    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Lleno los datos del formulario</h3>


                </div>
                <div class="card-body">
                    <form action="{{url('admin/configuraciones',$configuracion->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre de la institución</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->nombre}}" name="nombre" placeholder="Escriba aqui.." required>

                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{$message}}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Descripción de la institución</label> <b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->descripcion}}" name="descripcion" placeholder="Escriba aqui.." required>
                                            </div>

                                        </div>
                                        @error('descripcion')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror


                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->direccion}}" name="direccion" placeholder="Escriba aqui.."required>
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
                                            <label for="">Telefono</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->telefono}}" name="telefono" placeholder="Escriba aqui.." required>
                                            </div>

                                        </div>
                                        @error('telefono')
                                        <small style="color: red">{{$message}}</small>
                                        @enderror


                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Email</label><b> (*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" value="{{$configuracion->email}}" name="email" placeholder="Escriba aqui.." required>
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
                                    <label for="logo">Logo</label><b> (*)</b>
                                    <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png" class="form-control" >
                                    @error('logo')
                                    <small style="">{{$message}}</small>
                                    @enderror
                                    <br>
                                    <center><output id="list">
                                            <img src="{{asset('storage/'.$configuracion->logo)}}" width="100px" alt="imagen">
                                        </output></center>
                                    <script>
                                        function archivo(evt){
                                            var files = evt.target.files; //Fileslist object
                                            // obtenemos  la imagen  del campo 'file'.

                                            for(var i = 0, f; f = files[i]; i++){
                                                // solo admitimos imagenes.
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function (theFile) {
                                                    return function(e) {
                                                        //insertamos la imagen
                                                        document.getElementById("list").innerHTML = '<img class="thumb thumbnail" src="' + e.target.result +
                                                            '" width="70%" title="' + escape(theFile.name) + '"/>';

                                                    };
                                                }) (f);
                                                reader.readAsDataURL(f);
                                            }
                                        }
                                        document.getElementById("file").addEventListener('change', archivo, false);
                                    </script>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-success">Actualizar</button>
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
