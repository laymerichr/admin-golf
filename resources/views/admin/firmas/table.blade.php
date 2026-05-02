 <div class="table-responsive" >
        <table class="table table-striped table-hover table-condensed" id="firmas">
            <thead>
            <tr class="cabecera">
                <th style="width: 25%">Id Fed.</th>
                <th style="width: 25%">Federación</th>
                <th style="width: 35%">Firma</th>
                <th  data-orderable="false">Opciones</th>
            </tr>
            </thead>
            <tbody >
            <div id="table-wrapper">

                @foreach ($firmas as $key => $firma)
                    <tr class="">
                        <td >{{$firma->id_fed}}</td>
                        <td >{{$firma->federacion}}</td>
                        <td >
                            <img src="{{asset('storage/'.$firma->url)}}" width="50px" height="50px">
                        </td>
                        <td >
                            <a data-toggle="modal" data-target="#theModal" data-value="{{$firma->id}}"
                               title="Editar" class="btn btn-xs btn-default text-primary mx-1 shadow btn-edit">
                                <strong><i class="fa fa-edit"></i></strong>
                            </a>
                            <a href="{{route('firmas.destroy',['id'=>$firma['id']])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </div>

            </tbody>
        </table>
    </div>
