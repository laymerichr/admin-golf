<div class="table-responsive">
    <table class="table dataTable table-striped table-hover table-condensed"id="user_generator">
        <thead>
        <tr class="cabecera">
           {{-- <th>Imagen</th>--}}
            <th>#</th>
            <th>Correo</th>
            <th>Nombre</th>
            <th>Contraseña</th>
        </tr>
        </thead>
        <tbody >
        @foreach ($users as $key => $user)
            <tr class="">
                </td>
                <td>{{$key+1}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
                <td>casa1234</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>