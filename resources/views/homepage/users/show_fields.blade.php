<div class="col-md-3">

    <!-- Profile Image -->
    <div class="card card-gray card-outline">
        <div class="card-body box-profile">
            <!-- Created At Field -->
            <div class="col-sm-12">
                <h3 class="profile-username text-center">{{ $user->name }}</h3>
            </div>

            <p class="text-muted text-center">{{ $role->name }}</p>

            <!-- Created At Field -->
            <div class="col-sm-12">
                {!! Form::label('created_at', 'Creado' ) !!}
                <p>{{ $user->created_at }}</p>
            </div>

            <!-- Updated At Field -->
            <div class="col-sm-12">
                {!! Form::label('updated_at',  'Actualizado' ) !!}
                <p>{{ $user->updated_at }}</p>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.col -->
<div class="col-md-9">
    <div class="card card-outline card-gray">
        <div class="card-header p-2">
            <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Cambiar Contraseña</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Editar Datos</a></li>
            </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content">
                <div class="active tab-pane" id="activity">
                    <form method="POST" action="{{route('users.reset',['id'=>$user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 col-form-label">Nueva contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Entre contraseña" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-3 col-form-label">Confirmar Contraseña</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Confirmar contraseña" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                    <form method="POST" action="{{route('users.data',['id'=>$user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Correo</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name }}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
</div>
<!-- /.col -->

<script>
    $(document).ready(function () {
        bsCustomFileInput.init();
    });
</script>
