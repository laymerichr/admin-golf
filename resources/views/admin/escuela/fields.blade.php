<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Nueva Escuela</h3>
        </div>
        <form action="#" role="form" enctype="multipart/form-data" id="form">
            <div class="card-body">
                <div class="container wrapper-content">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtFecha">Fecha</label>
                                <input id="txtFecha" type="date" class="form-control  datepicker @error('fecha') is-invalid @enderror" name="txtFecha" value="" required>

                                @error('txtFecha')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtHora">Hora</label>
                                <input id="txtHora" type="time" class="form-control @error('hora') is-invalid @enderror" name="txtHora" value="" required>

                                @error('txtHora')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtFecha0ins_h">Fecha INICIO Inscripci&oacute;n</label>
                                <input id="txtFecha0ins_h" type="date" class="form-control  datepicker @error('fecha') is-invalid @enderror" name="txtFecha0ins_h" value="" required>

                                @error('txtFecha0ins_h')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtFecha1ins_h">Fecha FIN Inscripci&oacute;n</label>
                                <input id="txtFecha1ins_h" type="date" class="form-control  datepicker @error('fecha') is-invalid @enderror" name="txtFecha1ins_h" value="" required>

                                @error('txtFecha1ins_h')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtDireccion">Direcci&oacute;n</label>
                                <a href="#" class="test" data-toggle="tooltip" data-placement="top" title="Dirección del campo del torneo" ><i class="fas fa-info-circle" style="height: 0px;margin-left: 10px; padding-top: 1px;"></i></a>
                                <input id="txtDireccion" type="text" class="form-control" name="txtDireccion" value="" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtTelefono">Tel&eacute;fono</label>
                                <input id="txtTelefono" type="text" class="form-control" name="txtTelefono" value="" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtWeb">Web de Poster</label>
                                <input id="txtWeb" type="text" class="form-control" name="txtWeb" value="{{session('web')}}" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="txtPrecio">Precio por Pareja (€)</label>
                                <a href="#" class="test" data-toggle="tooltip" data-placement="top" title="Recomendado 18 € " ><i class="fas fa-info-circle" style="height: 0px;margin-left: 10px; padding-top: 1px;"></i></a>
                                <input id="txtPrecio" type="text" class="form-control" name="txtPrecio" value="" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ui-front">
                                <label for="textarea_v">Texto Posters</label>
                                <textarea class="form-control" {{--aria-label="With textarea"--}} rows="8" id="textarea_v" name="textarea_v" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group ui-front">
                                <label><b>Estados Friends Cup</b></label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label >Visible</label><br>
                                <select class="form-control" id="txtCmVisible" name="txtCmVisible" required style="width: 100%">
                                    <option value="1" selected><span style="color: #888;">Si</span></option>
                                    <option value="0"><span style="color: #888;">No</span></option>
                                </select>

                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="url_inscrip">URL inscripción</label>
                                <input id="url_inscrip" type="text" class="form-control" name="url_inscrip" value="**************************" disabled >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-0 float-right mt-3">
                    <div class="form-group">
                        <button type="button" class=" btn btn-outline btn-dark dim"
                                data-dismiss="modal"
                                id="closeModal">
                            Cerrar
                        </button>

                        <button type="button" class="btn btn-outline btn-success dim"
                                id="addTorneo"
                        >
                            <span class="align-middle">Guardar</span>
                            <i class="fa fa-save align-middle"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-footer">

            </div>
        </form>
    </div>
</div>

<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">

<script>
    $(document).ready(function () {
        // Restringiendo fechas inicio y fin del proceso
        var today = new Date();

        // fecha
        var dd_start = today.getDate();
        var mm_start = today.getMonth()+1; //January is 0!

        var yyyy_start = today.getFullYear();
        if(dd_start<10){dd_start='0'+dd_start}
        if(mm_start<10){mm_start='0'+mm_start}
        var date_start = yyyy_start+'-'+mm_start+'-'+dd_start;

        $('#txtFecha0ins_h').val(date_start)
        $('#txtFecha1ins_h').prop('min', date_start);

        // Hora
        var hour = today.getHours();
        var mins = today.getMinutes();

        if (mins<10)
            mins = '0' + mins;

        $('#txtHora').val(hour + ':' +  mins);

        $('#txtCmVisible').select2(
            {
                placeholder: 'Seleccionar',
                tags: true,
                tokenSeparators: [','],
            }
        );
    });
</script>

<script>
    /**
     * Inicializando el Custon file input de Bootstrap para cargar la imagen
     */
    bsCustomFileInput.init();

    $('#form').validate({
        rules: {
            txtFecha: {
                required: true,
            },
            txtHora: {
                required: true,
            },
            txtFecha0ins_h: {
                required: true,
            },
            txtFecha1ins_h: {
                required: true,
            },
            txtDireccion: {
                required: true,
            },
            txtTelefono: {
                required: true,
            },
            txtWeb: {
                required: true,
            },
            txtPrecio: {
                required: true,
            },
            textarea_v: {
                required: true,
            },
            url_inscrip: {
                required: true,
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $("#addTorneo").click(function (e) {
        if ($('#form').valid()) {
            var formData = new FormData($('#form') [0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: route('friends_cup.store'),
                datatype: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {

                   console.log(data)
                    var msg= {
                        "title"         : "Éxito",
                        "notification"  : "Torneo creado exitosamente.",
                        "type"          : "success",
                    };
                    toastrFire (msg);
                    /**
                     * Forzar recarga de la pagina al salir de modal por el botan guardar
                     */
                    window.location.reload();
                },
                error: function (reject) {
                    if( reject.status === 422 ) {
                        var response = $.parseJSON(reject.responseText);
                        var msg= {
                            "title"         : "Error",
                            "notification"  : "",
                            "type"          : "error",
                        };
                        $.each( response.errors, function( key, value) {
                            msg.notification  += value + "<br>";
                            let element = $('[name="'+key+'"]');
                            let error = '<span id="en-error" class="error invalid-feedback">'+ value+'</span>'
                            $(element).addClass('is-invalid');
                            $(element).closest('.form-group').append(error);
                        });
                        toastrFire (msg);
                    }
                }
            });
        }
    });
</script>