
@extends('adminlte::page')
@section('title', 'Generador de Usuarios | Principal')
@section('plugins.datatables', true)
@section('content')

    <div class="content px-3">
        <div class="clearfix"></div>
        <div class="card card-outline card-primary" >

            <div class="card-header d-flex">
                <div class="col-sm-6">
                    <h2>Usuarios</h2>
                </div>
            </div>
            <div class="card-body">

                @include('admin.factory.table')

                <div class="card-footer clearfix float-right">
                    <div class="float-right">

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    @routes
    <script> console.log('User Generator'); </script>
    <script>
        const lang="/vendor/datatables/"+'{{ Config('app.locale') }}'+".json"
        $(function () {
            $('#user_generator').DataTable( {
                processing: true,
                dom: '<"float-right mb-2"B> <"clearfix"><"d-flex"<"floar-left w-100"l><"float-right"f>>tip',
                buttons: [
                    {
                        extend:'excelHtml5',
                        text:"{{__('datatable.excel')}}",
                        autofilter:true,
                        title:"Usuarios",
                        exportOptions:{
                            columns:[0,1,2]}
                    },
                    {
                        extend:'pdf',
                        text:'PDF',
                        title:"Usuarios",
                        download: 'open',
                        exportOptions:{
                            columns:[0,1,2]}
                    }
                ],

                //"pagingType": "simple_numbers",
                "bJQueryUI":false,
                "lengthMenu": [ [10, 20, 30, -1], [10, 20, 50, "All"] ],
                //"pageLength": 5,
                //"scrollY": 200,
                //"scrollX": true,
                language:{
                    url:lang
                }
            } )
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
@stop
