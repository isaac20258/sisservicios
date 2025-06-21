@extends('adminlte::page')


@section('content_header')
    <h1><b>Registro de una nueva solicitud</b></h1>

    <hr>
@stop

@section('content')
    <form action="{{url('/admin/solicitud/create')}}" method="post">
        @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i> Datos del cliente
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Busqueda del cliente</label><b> (*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <select name="cliente_id" id="" class="form-control select2">
                                    <option value="">Buscar cliente...</option>
                                    @foreach($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{$cliente->nro_documento." - ".$cliente->apellidos." ".$cliente->nombres}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @error('cliente_id')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <hr>
                      <div class="" id="contenido_cliente" style="display: none">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Documento</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                          </div>
                                          <input type="text" class="form-control"  id="nro_documento" name="nro_documento" placeholder="Escriba aqui..." disabled>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Nombres del cliente</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Apellidos del cliente</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Direccion</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Género</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="genero" name="genero" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Email</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                          </div>
                                          <input type="email" class="form-control"id="email" name="email" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Celular</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                          </div>
                                          <input type="number" class="form-control" id="celular" name="celular" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-success">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-toolbox"></i>   Datos del servicios
                       </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Busqueda del servicios</label><b> (*)</b>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                </div>
                                <select name="servicio_id" id="servicio_id" class="form-control select2">
                                    <option value="">Buscar cliente...</option>
                                    @foreach($servicios as $servicio)
                                        <option value="{{$servicio->id}}">{{$servicio->nombre."- " .$servicio->costo}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    @error('servicio_id')
                    <small style="color: red">{{$message}}</small>
                    @enderror

                    <hr>
                      <div class="" id="contenido_servicio" style="display: none">
                          <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Nombre</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                          </div>
                                          <input type="text" class="form-control"  id="nombre" name="nombre" placeholder="Escriba aqui..." disabled>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Descripcion</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">Costo</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-user"></i></span>
                                          </div>
                                          <input type="texto" class="form-control" id="costo" name="costo" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label for="">estado</label>
                                      <div class="input-group mb-3">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                          </div>
                                          <input type="text" class="form-control" id="estado" name="estado" placeholder="Escriba aqui..." disabled>

                                      </div>
                                  </div>
                              </div>
                          </div>
                          
                      </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card  card-warning">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-money-bill-wave"></i> Datos de pago
                        </h3>
                </div>
                <div class="card-body">
                        <div class="row"> 
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha del servicios</label>
                                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                                    @error('fecha_inicio')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monto</label>
                                    <input type="text" id="monto" name="monto" class="form-control" >
                                    @error('monto')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Medio de pago</label>
                                     <select name="metodo_pago" id="" class="form-control" >
                                            <option value="efectivo">Efectivo</option>
                                            <option value="tarjeta">Tarjeta</option>
                                            <option value="transferencia">Transferencia</option>
                                     </select>
                                   
                                    @error('direccion_servicio')
                                    <small style="color: red">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>
                       </div>
                        
                        
                        <hr>
                        <button  type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-credit-card"></i> Pagar servicio</button>
                </div>

            </div>

        </div>


    </div>

       </form>
@stop
@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important; /* Ajusta la altura toral del select */
        }
    </style>


@stop

@section('js')
    <script>
     $('.select2').select2({});

    // Evento para selección de cliente
    $('select[name="cliente_id"]').on('change', function () {
        var id = $(this).val();

        if (id){
            $.ajax({
                url:"{{url('/admin/solicitud/cliente/')}}"+'/'+id,
                type: 'GET',
                success: function (cliente){
                    $('#contenido_cliente').show();
                    $('#nro_documento').val(cliente.nro_documento);
                    $('#nombres').val(cliente.nombres);
                    $('#apellidos').val(cliente.apellidos);
                    $('#direccion').val(cliente.direccion);
                    $('#genero').val(cliente.genero);
                    $('#email').val(cliente.email);
                    $('#celular').val(cliente.celular);
                },
                error:function (){
                    alert('No se pudo obtener la información del cliente');
                }
            });
        } else {
            $('#contenido_cliente').hide();
        }
    });

    // Evento para selección de servicio
    $('#servicio_id').on('change', function (){
        var id = $(this).val();

        if (id){
            $.ajax({
                url:"{{url('/admin/solicitud/servicio/')}}"+'/'+id,
                type: 'GET',
                success: function (servicio){
                    $('#contenido_servicio').show();
                    $('#nombre').val(servicio.nombre);
                    $('#descripcion').val(servicio.descripcion);
                    $('#costo').val(servicio.costo);
                    $('#estado').val(servicio.estado);
                },
                error:function (){
                    alert('No se pudo obtener la información del servicio');
                }
            });
        } else {
            $('#contenido_servicio').hide();
        }
    });
</script>     
    </script>

@stop

