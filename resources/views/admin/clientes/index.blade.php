@extends('adminlte::page')


@section('content_header')
    <h4 class="mb-0"><i class="fas fa-users"></i> Listado de clientes</h4>

    <hr>
@stop

@section('content')
    <div class= "row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header bg-light">
                    <strong></i>Clientes registrados</strong>

                    
                </div>
                <div class="card-body">
                    <table id="table1" class ="table table-bordered table-hover table-striped table-sm text-center">
                        <thead class="thead-light">
                        <tr>
                            <th style ="text-align: center">Nrc</th>
                            <th style ="text-align: center">Documento</th>
                            <th style ="text-align: center">Apellidos y nombres</th>
                            <th style ="text-align: center">Género</th>
                            <th style ="text-align: center">Email</th>
                            <th style ="text-align: center">Direccion</th>
                            <th style ="text-align: center">Celular</th>
                            <th style ="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $contador = 1;
                        @endphp

                        @foreach($clientes as $cliente)

                            <tr>
                                <td  style ="text-align: center">{{$contador++}}</td>
                                <td>{{$cliente->nro_documento}}</td>
                                <td>{{$cliente->apellidos." ".$cliente->nombres}}</td>
                                <td>
                                @if($cliente->genero == 'FEMENINO')
                                    <span class="badge badge-pink"><i class="fas fa-venus"></i> Femenino</span>
                                @elseif($cliente->genero == 'MASCULINO')
                                    <span class="badge badge-primary"><i class="fas fa-mars"></i> Masculino</span>
                              @else
                                  <span class="badge badge-secondary"><i class="fas fa-genderless"></i> Otro</span>
                              @endif
                                </td>
                                <td>{{$cliente->email}}</td>
                                <td>{{$cliente->direccion}}</td>
                                <td>{{$cliente->celular}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic exmaple">
                                        <a href="{{url('/admin/clientes',$cliente->id)}}" style="border-radius:4px 0px 0px 4px " class="btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                        <a href="{{url('/admin/clientes/'.$cliente->id.'/edit')}}" style="border-radius:0px 0px 0px 0px "  class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i></a>
                                        <form action="{{url('/admin/clientes',$cliente->id)}}" method="post"
                                              onclick="preguntar{{$cliente->id}} (event)" id="miFormulario{{$cliente->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <script>
                                            function preguntar{{$cliente->id}} (event) {
                                                event.preventDefault();
                                                swal.fire({
                                                    title: '¿Desea eliminar este registiro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result)=> {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$cliente->id}}');
                                                        form.submit();
                                                    }
                                                });

                                            }
                                        </script>
                                    </div>

                                </td>
                            </tr>


                        @endforeach


                        </tbody>

                    </table>

                </div>

            </div>

        </div>


    </div>

@stop
@section('css')
    <style>
        /* Fondo tranparente y sin borde en el contenedor */
        #table1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center; /*Centrar los botones */
            gap: 10px; /*Espacio entre botones */
            margin-bottom:15px; /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */

        #table1_wrapper .btn {
            color:#fff; /*Color del texto en blanco */
            border-radius: 4px; /*Borden redondeados */
            padding: 5px 15px; /*Espaciado interno */
            font-size: 14px; /*Tamaño de la fuente */
        }

        /*Color tipos de botones */

        .btn-danger {background-color: #dc3545; border:none; }
        .btn-success {background-color: #28a745; border:none; }
        .btn-info {background-color: #17a2b8; border:none; }
        .btn-warning {background-color: #ffc107; color:#212529; border:none; }
        .btn-default {background-color: #6e7176; color:#212529; border:none; }


    </style>

@stop

@section('js')
    <script>
        $(function() {
            $("#table1").DataTable({
                "pageLength":5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Clientes",
                    "infoEmpty": "Mostrando 0 a 0 de 0  Clientes",
                    "infoFiltered": "(Filtrando de _MAX_  total Clientes)",
                    "lengthMenu": "Mostrar _MENU_ Clientes",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior",
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [
                    {text: '<i class="fas fa-copy"></i> COPIAR', extend: 'copy', className: 'btn btn-default' },
                    {text: '<i class="fas fa-file-pdf"></i> PDF', extend: 'pdf', className: 'btn btn-danger' },
                    {text: '<i class="fas fa-file-csv"></i> CSV', extend: 'csv', className: 'btn btn-info' },
                    {text: '<i class="fas fa-file-excel"></i> EXCEL', extend: 'excel', className: 'btn btn-success' },
                    {text: '<i class="fas fa-print"></i> IMPRIMIR', extend: 'print', className: 'btn btn-warning' }
                ]
            }).buttons().container().appendTo('#table1_wrapper .row:eq(0)');
        });
    </script>
@stop

