<div class="card">
        <div class="card-header">
            <h3 class="card-title">Nuevo Club</h3>
        </div>
        <form action="#" role="form" enctype="multipart/form-data" id="form_club">
            <div class="card-body">
                <div class="container wrapper-content">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CodClub">Código</label>
                                <input id="CodClub" type="text" class="form-control" name="CodClub" value="" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Club">Nombre</label>
                                <input id="Club" type="text" class="form-control" name="Club" value="" required >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label >Provincia</label><br>
                                <select class="form-control" id="IdProvincia" name="IdProvincia" required>
                                    <option value="-1">Selecciones</option>
                                    @foreach($provincias as $prov)
                                        <option value="{{$prov->IdProvincia}}">{{$prov->Provincia}}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Direccion">Dirección</label>
                                <input id="Direccion" type="text" class="form-control" name="Direccion" value="" required >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CodPostal">Código Postal</label>
                                <input id="CodPostal" type="text" class="form-control" name="CodPostal" value="" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Telefono">Tel&eacute;fono</label>
                                <input id="Telefono" type="text" class="form-control" name="Telefono" value="" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Fax">Fax</label>
                                <input id="Fax" type="text" class="form-control" name="Fax" value="" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input id="Email" type="text" class="form-control" name="Email" value="" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="GPS">GPS</label>
                                <input id="GPS" type="text" class="form-control" name="GPS" value="" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Web">Web</label>
                                <input id="Web" type="text" class="form-control" name="Web" value="" required >
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Presidente">Presidente</label>
                                <input id="Presidente" type="text" class="form-control" name="Presidente" value="" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="checkbox text-left">
                                <label class="col-12 pt-2 pl-0">
                                    <input type="checkbox" id="Becado" name="Becado" value="">
                                    Becado<span></span>
                                </label>
                            </div>
                            <div class="checkbox text-left">
                                <label class="col-12 pt-2 pl-0">
                                    <input type="checkbox" id="Campo"  name="Campo" value="">
                                    Campo<span></span>
                                </label>
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
                                id="addClub"
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

<link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">

<script>
    $(document).ready(function () {
        $('#IdProvincia').select2(
            {
                placeholder: 'Seleccionar',
                tags: true,
                tokenSeparators: [','],
              //  dropdownParent: $('#form').closest('#theModal')
            }
        );
    });
</script>

<script>
    /**
     * Inicializando el Custon file input de Bootstrap para cargar la imagen
     */
    bsCustomFileInput.init();

    $("#addClub").click(function (e) {
        if ($('#form_club').valid()) {
            var formData = new FormData($('#form_club') [0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: route('clubes.store'),
                datatype: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {

                   console.log(data)
                    var msg= {
                        "title"         : "Éxito",
                        "notification"  : "Club creado exitosamente.",
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