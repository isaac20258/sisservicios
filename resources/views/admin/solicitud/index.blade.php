@extends('adminlte::page')


@section('content_header')
    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
    <h4 class="mb-0"><i class="fas fa-file-alt"></i> Listado de solicitudes</h4>
   </div>

    
@stop

@section('content')
    <div class= "row">
        <div class="col-md-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Solicitud registrados</h3>

                    

                </div>
                <div class="card-body">
                    <table id="table1" class ="table table-bordered table-hover table-striped table-sm">
                        <thead>
                        <tr>
                            <th style ="text-align: center">Nrc</th>
                            <th style ="text-align: center">Documento</th>
                            <th style ="text-align: center">Apellidos y nombres</th>
                            <th style ="text-align: center">Nombre servicio</th>
                            <th style ="text-align: center">Monto</th>
                            <th style ="text-align: center">Metodo pago</th>
                            <th style ="text-align: center">Estado pago</th>
                            
                            <th style ="text-align: center">Fecha de inicio</th>
                            <th style ="text-align: center">Acción</th>
                        </tr>
                        </thead>
                        <tbody>

                        @php
                            $contador = 1;
                        @endphp

                        @foreach($solicitudes as $solicitud)

                            <tr>
                                <td  style ="text-align: center">{{$contador++}}</td>
                                <td>{{$solicitud->cliente->nro_documento}}</td>
                                <td>{{$solicitud->cliente->apellidos." ".$solicitud->cliente->nombres}}</td>
                                <td>{{$solicitud->servicio->nombre}}</td>
                                <td>{{$solicitud->monto}}</td>
                                <td>
                                    @if($solicitud->metodo_pago === 'efectivo')
                                       <span class="badge badge-secondary"><i class="fas fa-money-bill-wave"></i> Efectivo</span>
                                    @elseif($solicitud->metodo_pago === 'transferencia')
                                     <span class="badge badge-info"><i class="fas fa-university"></i> Transferencia</span>
                                    @endif
                                </td>
                                <td>
                                    @if($solicitud->estado_pago === 'pagado')
                                      <span class="badge badge-success"><i class="fas fa-check-circle"></i> Pagado</span>
                                    @else
                                     <span class="badge badge-warning"><i class="fas fa-clock"></i> Pendiente</span>
                                    @endif
                                </td>
                                
                                <td>{{$solicitud->fecha_inicio}}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group" aria-label="Basic exmaple">
                                            <form action="{{url('/admin/solicitud',$solicitud->id)}}" method="post"
                                                  onclick="preguntar{{$solicitud->id}} (event)" id="miFormulario{{$solicitud->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 4px 4px 0px"><i class="fas fa-trash"></i></button>
                                            </form>
                                        
                                        <script>
                                            function preguntar{{$solicitud->id}} (event) {
                                                event.preventDefault();
                                                swal.fire({
                                                    title: '¿Desea eliminar esta solicitud?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result)=> {
                                                    if (result.isConfirmed) {
                                                        var form = $('#miFormulario{{$solicitud->id}}');
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
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Solicitud",
                    "infoEmpty": "Mostrando 0 a 0 de 0  Solicitud",
                    "infoFiltered": "(Filtrando de _MAX_  total  Solicitud)",
                    "lengthMenu": "Mostrar _MENU_ Solicitud",
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


