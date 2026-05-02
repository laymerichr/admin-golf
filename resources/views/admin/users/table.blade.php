<div class="table-responsive">
    <table class="table dataTable table-striped table-hover table-condensed"id="user">
        <thead>
        <tr class="cabecera">
           {{-- <th>Imagen</th>--}}
            <th>Nombre</th>
            <th>Rol</th>
            <th>Correo</th>
            <th>Club</th>
            <th>Código Club</th>
            <th>Federación</th>
            <th data-orderable="false">Opciones</th>
        </tr>
        </thead>
        <tbody >
        @foreach ($users as $user)
            <tr class="">
                </td>
                <td>{{$user['name']}}</td>
                <td>{{count($user->roles)>0 ? $user->roles[0]->name : ''}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['club']}}</td>
                <td>{{$user['cod_club']}}</td>
                <td>{{$user['federacion']}}</td>
                <td >
                    <a data-toggle="modal" data-target="#theModal" data-value="{{$user['id']}}"
                       title="Editar" class="btn btn-xs btn-default text-primary mx-1 shadow btn-edit">
                        <strong><i class="fa fa-edit"></i></strong>
                    </a>
                    <a href="{{route('users.destroy',['id'=>$user['id']])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="cabecera">
           {{-- <th>Imagen</th>--}}
            <th>Nombre</th>
            <th>Rol</th>
            <th>Correo</th>
            <th data-orderable="false">Opciones</th>
        </tr>
        </tfoot>
    </table>
</div>