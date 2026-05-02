<div class="card">
    <div class="card-header">
        <h3 class="card-title">Adicionar Usuario</h3>
    </div>
 <form action="#" role="form" enctype="multipart/form-data" id="form">
    <div class="card-body">
        <div class="container wrapper-content">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Correo</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required>

                                @error('email')
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
                            <label for="role_id">Rol</label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required readonly="true">
                                <option value="">
                                    Seleccionar
                                </option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}" @if(old('role_id') == $role->id) selected @endif>
                                        {{$role->name}}
                                    </option>
                                @endforeach
                            </select>
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="club-select-contenedor">
                            <div class="form-group">
                                <label for="cod_club">Club</label>
                                <select class="form-control @error('cod_club') is-invalid @enderror" id="cod_club" name="cod_club">
                                    <option value="">
                                        Seleccionar
                                    </option>
                                    @foreach ($clubes as $club)
                                        <option value="{{$club->CodClub}}" >
                                            {{$club->Club}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('cod_club')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div id="federacion-select-contenedor">
                            <div class="form-group">
                                <label for="id_fed">Federación</label>
                                <select class="form-control @error('id_fed') is-invalid @enderror" id="id_fed" name="id_fed">
                                    <option value="">
                                        Seleccionar
                                    </option>
                                    @foreach ($federaciones as $fed)
                                        <option value="{{$fed->IdFed}}" >
                                            {{$fed->Federacion}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_fed')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">

                    {{--CONTRASEñAS--}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Introducir contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Confirmar contraseña</label>
                            <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" value="" required >

                            @error('confirm_password')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
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

                <button type="button" class="btn btn-outline btn-primary dim"
                        id="addUser"
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
        $('#cod_club').select2(
            {
                placeholder: 'Seleccionar',
                tags: true,
                tokenSeparators: [','],
            }
        );
        $('#id_fed').select2(
            {
                placeholder: 'Seleccionar',
                tags: true,
                tokenSeparators: [','],
            }
        );

        $('#club-select-contenedor').hide();
        $('#federacion-select-contenedor').hide();

        $('#role_id').change(function () {

            if ($(this).val() == 3) // Role: Club
            {
                $('#club-select-contenedor').show();
                $('#federacion-select-contenedor').hide();
                $('#cod_club').prop('required',true)
                $('#id_fed').prop('required',false)
            }

            if ($(this).val() == 5) // Role: federacion
            {
                $('#club-select-contenedor').hide();
                $('#federacion-select-contenedor').show();
                $('#id_fed').prop('required',true)
                $('#cod_club').prop('required',false)
            }
        })
    });
</script>

<script>
    /**
     * Inicializando el Custon file input de Bootstrap para cargar la imagen
     */
    bsCustomFileInput.init();

    $('#form').validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
            },
            role_id: {
                required: true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
            }
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

    $("#addUser").click(function (e) {
        if ($('#form').valid()) {
            var formData = new FormData($('#form') [0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'post',
                url: route('users.store'),
                datatype: 'json',
                data: formData,
                contentType: false,
                processData: false,
                success: function (data) {
                    var msg= {
                        "title"         : "Éxito",
                        "notification"  : "Usuario creado exitosamente.",
                        "type"          : "success",
                    };
                    toastrFire (msg);
                    /**
                     * Forzar recarga de la pagina al salir de modal por el botan guardar
                     */
                    window.location.reload();
                },
                error: function (reject) {
                    console.log(reject);
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
