 <div class="table-responsive" >
        <table class="table table-striped table-hover table-condensed" id="correos">
            <thead>
            <tr class="cabecera">
                <th >Dirección electrónica</th>
                <th  data-orderable="false">Opciones</th>
            </tr>
            </thead>
            <tbody >
            <div id="table-wrapper">

                @foreach ($correos as $key => $correo)
                    <tr class="">
                        <td >{{$correo->email}}</td>
                        <td >
                            <a data-toggle="modal" data-target="#theModal" data-value="{{$correo->id}}"
                               title="Editar" class="btn btn-xs btn-default text-primary mx-1 shadow btn-edit">
                                <strong><i class="fa fa-edit"></i></strong>
                            </a>
                            <a href="{{route('correos.destroy', ['id'=>$correo->id])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </div>
            </tbody>
        </table>
    </div>
