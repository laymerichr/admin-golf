 <div class="table-responsive">
        <table class="table dataTable table-striped table-hover table-condensed" id="escuelas">
            <thead>
            <tr class="cabecera">
                <th style="width: 100px;">Cod. Club</th>
                <th style="width: 200px;">Nombre Club</th>
                <th style="width: 200px;">Nombre Escuela</th>
                <th style="width: 200px;">Territorial</th>
                <th>Activo</th>
                <th>E.J.</th>
                <th>G.C.</th>
                <th>H.G.</th>
                <th>C.</th>
                <th>F.C.</th>
                <th style="width: 100px;">Fecha Alta</th>
                <th data-orderable="false">Opciones</th>
            </tr>
            </thead>
            <tbody >
            <div id="table-wrapper">

                @foreach ($escuelas as $key => $escuela)
                    <tr class="">
                        <td >{{$escuela->CodClub}}</td>
                        <td >{{$escuela->NombreClub}}</td>
                        <td >{{$escuela->NombreEscuela}}</td>
                        <td >{{$escuela->federacion->Federacion ?? ''}}</td>
                        <td ><input type="checkbox" @if($escuela->Activo) checked @endif disabled="disabled"></td>
                        <td ><input type="checkbox" @if($escuela->EscuelaJuvenil) checked @endif disabled="disabled"></td>
                        <td ><input type="checkbox" @if($escuela->GolfColegios) checked @endif disabled="disabled"></td>
                        <td ><input type="checkbox" @if($escuela->Holagolf) checked @endif disabled="disabled"></td>
                        <td ><input type="checkbox" @if($escuela->Colectivos) checked @endif disabled="disabled"></td>
                        <td ><input type="checkbox" @if($escuela->FriendsCup) checked @endif disabled="disabled"></td>
                        <td >{{\Carbon\Carbon::parse($escuela->FechaAlta)->format('d-m-Y')}}</td>
                        <td >
                            <div class="dropdown show">
                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Seleccione
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a data-toggle="modal" data-target="#theModal" data-value="{{$escuela->NombreWeb}}"
                                   title="Editar" class="btn btn-default btn-edit">
                                    <strong><i class="fa fa-edit"></i></strong>
                                </a>
                                 <a href="{{route('escuelas.enable',['id'=>$escuela['NombreWeb']])}}" class="btn btn-default" @if($escuela->Activo) title="Desactivar" @else title="Activar" @endif  id=""><i class="fa fa-check-circle"></i></a>
                                <a href="{{route('escuelas.destroy',['id'=>$escuela['NombreWeb']])}}" class="btn btn-default" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </div>

            </tbody>
        </table>
    </div>
