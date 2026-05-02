<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Firma</h3>
        </div>
        <form action="#" role="form" enctype="multipart/form-data" id="form_firma">
            <input type="hidden" name="id" value="{{$firma->id}}">
            <div class="card-body">
                <div class="container wrapper-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="id_fed">Federación</label>
                                <select class="form-control" id="id_fed" name="id_fed" required readonly="true" disabled>
                                    @foreach ($federaciones as $fed)
                                        <option value="{{$fed->IdFed}}" @if($fed->IdFed === $firma->id_fed) selected @endif>
                                            {{$fed->Federacion}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group col-md-12 ">
                                <label for="image">Firma: </label>
                                <img src="{{asset('storage/'.$firma->url)}}" width="50px" height="50px">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image" accept=".jpg,.png" required>
                                        <label class="custom-file-label" data-browse="Buscar" for="image">Elegir archivo</label>
                                    </div>
                                </div>
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
                                id="editFirma"
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
        $('#id_fed').select2(
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

    $("#editFirma").click(function (e) {
            var formData = new FormData($('#form_firma') [0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: route('firmas.update'),
                datatype: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {

                   console.log(data)
                    var msg= {
                        "title"         : "Éxito",
                        "notification"  : "Firma editada exitosamente.",
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
    });
</script>