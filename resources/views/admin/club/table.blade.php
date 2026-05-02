 <div class="table-responsive">
        <table class="table dataTable table-striped table-hover table-condensed" id="clubes">
            <thead>
            <tr class="cabecera">
                <th>Cod.</th>
                <th>Nombre</th>
                <th>Provincia</th>
                <th>Comunidad</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th data-orderable="false">Opciones</th>
            </tr>
            </thead>
            <tbody >
            <div id="table-wrapper">

                @foreach ($clubes as $key => $club)
                    <tr class="">
                        <td >{{$club->CodClub}}</td>
                        <td >{{$club->Club}}</td>
                        <td >{{$club->Provincia ?? ''}}</td>
                        <td >{{$club->Comunidad ?? ''}}</td>
                        <td >{{$club->Telefono}}</td>
                       {{-- <td >{{$club->Email}}</td>--}}
                        <td >{{$club->Direccion}}</td>
                        <td >
                            <a data-toggle="modal" data-target="#theModal" data-value="{{$club->CodClub}}"
                               title="Editar" class="btn btn-xs btn-default text-primary mx-1 shadow btn-edit">
                                <strong><i class="fa fa-edit"></i></strong>
                            </a>
                            <a href="{{route('clubes.destroy',['id'=>$club['CodClub']])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </div>

            </tbody>
        </table>
    </div>
