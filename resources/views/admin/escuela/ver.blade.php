
@extends('adminlte::page')

@section('title', 'Ver | Entrada')
@section('plugins.datatables', true)
@section('content')

    <div class="content px-3">
        <div class="clearfix"></div>

        <div class="card card-outline card-primary" >

            <div class="card-header d-flex">
                <div class="col-sm-6">
                    <h2>Detalles de la Entrada</h2>
                </div>
                <div class="col-sm-6 float-right">
                    <a class="btn btn-danger float-right btn-add"
                       href="{{route('entradas.index')}}"
                       >
                       Volver
                    </a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">

                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title">Generales</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <strong>
                                            No. Reg
                                        </strong>
                                        <p>
                                            {{$entrada->no_registro_general}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <strong>
                                            Fecha
                                        </strong>
                                        <p>
                                            {{\Carbon\Carbon::parse($entrada->fecha)->format('d-m-Y')}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <strong>
                                            Hora
                                        </strong>
                                        <p>
                                            {{$entrada->hora}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <strong>
                                            Documento
                                        </strong>
                                        <p>
                                            {{$entrada->tipo_documento->nombre}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <strong>
                                            Remitente
                                        </strong>
                                        <p>
                                            {{$entrada->remitente}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <strong>
                                            Destinatario
                                        </strong>
                                        <p>
                                            {{$entrada->destinatario->nombre}}
                                        </p>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <strong>
                                            Localidad
                                        </strong>
                                        <p>
                                            {{$entrada->localidad}}
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <strong>
                                            Contenido
                                        </strong>
                                        <p>
                                            {{$entrada->contenido}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-1">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Datos Autor</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <strong>
                                            Nombre
                                        </strong>
                                        <p>
                                            {{$entrada->usuario->name}}
                                        </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <strong>
                                            Correo
                                        </strong>
                                        <p>
                                            {{$entrada->usuario->email}}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h3 class="card-title">Adjuntos</h3>
                                </div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <table id="table-adjuntos-entradas" class="table dataTable table-striped table-hover table-condensed">
                                            <thead>
                                            <tr class="cabecera">
                                                <th>Nombre</th>
                                                <th>Opciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            @foreach($entrada->adjuntos as $adjunto)
                                                <tr class="">
                                                    <td>
                                                        {{$adjunto->original_name}}
                                                    </td>
                                                    <td>
                                                        <a target="_blank" href="{{route('entradas.show_adjunto', ['entrada_id'=>$entrada->id,'adjunto_id'=>$adjunto->id])}}" title="Ver Adjunto">
                                                            <i class="fa fa-eye"></i>
                                                        </a>

                                                        <span>|</span>

                                                        <a href="{{route('entradas.dowload', ['entrada_id'=>$entrada->id,'adjunto_id'=>$adjunto->id])}}" title="Descargar Adjunto">
                                                            <i class="fa fa-download"></i>
                                                        </a>

                                                        <span>|</span>

                                                        <a href="{{route('entradas.delete-adjunto', ['entrada_id'=>$entrada->id,'adjunto_id'=>$adjunto->id])}}" onclick="return confirm('Confirme eliminar');" title="Elimar Adjunto">
                                                            <i class="fa fa-trash"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="row float-right">
                                    <a href="#" class="btn btn-outline-success add-adjunto"
                                       data-toggle="modal" data-target="#theModal" data-value="{{$entrada->id}}"
                                       title="Adjuntar"
                                    >
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row float-right mt-0">
                    <button class="btn btn-outline-success" id="imprimir">
                        <label>
                            Imprimir
                            <i class="fa fa-print"></i>
                        </label>
                    </button>
                </div>
            </div>

        </div>
    </div>
    @include('common.modal.modal')
@endsection

@section('js')
    @routes
    <script> console.log('Ver Entrada'); </script>

    <script>
        $(document).ready(function () {

        });

    </script>

    <script>
        /*const lang="/vendor/datatables/"+'{{ Config('app.locale') }}'+".json"
        $('#table-adjuntos-entradas').DataTable({
            processing: true,
            //"pagingType": "simple_numbers",
            "bJQueryUI":false,
            "lengthMenu": [ [5, 10, 20, -1], [5, 10, 20, "All"] ],
            //"pageLength": 5,
            //"scrollY": 200,
            //"scrollX": true,
            language:{
                url:lang
            }
        })*/
    </script>

    <script>
        /*
        * Imprimir
        */

        $('#imprimir').click(function(){
            window.print();
            return false;
        });

    </script>

    <script>
        ///ventana modal de add adjuntos
        $(".add-adjunto").on("click",function() {
            var id=$(this).attr('data-value');
            $.ajax({
                url: route('entradas.add.adjunto', {'entrada_id': id}),
                type:"GET",
                success:function(resp){
                    $("#theModal .modal-body").html(resp);

                }
            });
        });
    </script>

    <script {{--src="{{ asset('js/custom-toastr.js') }}"--}}>
        /**
         * @function toastrFire lanza una notificacion utilizando el plugin Toastr
         * con los paramatros recibidos en un objeto
         *
         * @param msg contiene los valores title: titulo de la notificacion, notification:
         * descripcion del mensaje, y type: que es el tipo de notificacion, (ej success,o error)
         * msg = {
         *     title        : string,
         *     notification : string,
         *     type         : string
         * }
         */
        function toastrFire( msg ) {

            //const pos = (msg.notification.length > 40) ? "toast-top-full-width" : "toast-top-center";

            toastr.options = {
                "closeButton": true,
                "debug": false,
                "progressBar": true,
                "preventDuplicates": true,
                "positionClass": "toast-top-center",
                "onclick": null,
                "showDuration": "400",
                "hideDuration": "1000",
                "timeOut": "3000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "swing",
                "showMethod": "show",
                "hideMethod": "slideUp",
            }
            // Display a toast, with type [msg.type],message [msg.notification] and title [msg.title]
            switch (msg.type) {
                case "success":
                    toastr.options.onHidden=function () { $('#closeModal').click();}
                    toastr.success(msg.notification, msg.title);
                    break;
                case "info":
                    toastr.info(msg.notification, msg.title);
                    break;
                case "warning":
                    toastr.warning(msg.notification, msg.title);
                    break;
                default:
                    toastr.error(msg.notification, msg.title);
            }

        }
    </script>

@stop
