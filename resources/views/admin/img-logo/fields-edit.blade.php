<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Editar Logo</h3>
        </div>
        <form action="#" role="form" enctype="multipart/form-data" id="form_logo">
            <input type="hidden" name="id" value="{{$logo->id}}">
            <div class="card-body">
                <div class="container wrapper-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="club_code">Club</label>
                                <select class="form-control" id="club_code" name="club_code" required readonly="true" disabled>
                                    @foreach ($clubes as $club)
                                        <option value="{{$club->CodClub}}" @if($club->CodClub === $logo->club_code) selected @endif>
                                            {{$club->Club}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group col-md-12 ">
                                <label for="image">Logo: </label>
                                <img src="{{asset('storage/'.$logo->url)}}" width="50px" height="50px">
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
                                id="editLogo"
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
        $('#club_code').select2(
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

    $("#editLogo").click(function (e) {
            var formData = new FormData($('#form_logo') [0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: route('logos.update'),
                datatype: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {

                   console.log(data)
                    var msg= {
                        "title"         : "Éxito",
                        "notification"  : "Logo editado exitosamente.",
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