
@extends('adminlte::page')

@section('title', 'Usuarios | Principal')
@section('plugins.datatables', true)
@section('content')

    <div class="content px-3">
        @include('flash::message')
        <div class="clearfix"></div>

        <div class="card card-outline card-secondary mt-2" >

            <div class="card-header d-flex">
                <div class="col-sm-6">
                    <h4>Usuarios</h4>
                </div>
                <div class="col-sm-6 float-right">
                    <a class="btn btn-success float-right btn-add"
                       data-toggle="modal"
                       data-target="#theModal"
                       data-hint="Agregar">
                       Agregar
                    </a>
                </div>
            </div>
            <div class="card-body">
                @include('admin.users.table')
                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>
    @include('common.modal.modal')
@endsection

@section('js')
    @routes
    <script> console.log('User'); </script>
    <script>
        const lang="/vendor/datatables/"+'{{ Config('app.locale') }}'+".json"
        $(function () {
            $('#user').DataTable( {
                processing: true,
                dom: '<"float-right mb-2"B> <"clearfix"><"d-flex"<"floar-left w-100"l><"float-right"f>>tip',
                buttons: [
                ],
                "bJQueryUI":false,
                "lengthMenu": [ [10, 20, 30, -1], [10, 20, 50, "All"] ],
                //"scrollX": true,
                language:{
                    url:lang
                }
            } )
        });

    </script>

    <script>
        ///ventana modal de Usuarios add
        $(".btn-add").on("click",function() {
            $.ajax({
                url: route('users.create'),
                type:"GET",
                success:function(resp){
                    $("#theModal .modal-body").html(resp);

                }
            });
        });

        ///ventana modal de Usuarios Edit
        $(".btn-edit").on("click",function() {
            var id=$(this).attr('data-value');
            $.ajax({
                url: route('users.edit', {'id': id}),
                type:"GET",
                success:function(resp){
                    $("#theModal .modal-body").html(resp);
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#theModal").on('hidden.bs.modal', function () {
                location.reload();
            });

            ////Validate
            let loc = "{{ Config('app.locale') }}"
            if (loc!=="" && loc !== "en")
                $.getScript("/vendor/jquery-validation/localization/messages_"+loc+".min.js")
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
