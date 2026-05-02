 <div class="table-responsive" >
        <table class="table table-striped table-hover table-condensed" id="logos">
            <thead>
            <tr class="cabecera">
                <th style="width: 25%">Cod. Club</th>
                <th style="width: 25%">Club</th>
                <th style="width: 35%">Logo</th>
                <th  data-orderable="false">Opciones</th>
            </tr>
            </thead>
            <tbody >
            <div id="table-wrapper">

                @foreach ($logos as $key => $logo)
                    <tr class="">
                        <td >{{$logo->club_code}}</td>
                        <td >{{$logo->club}}</td>
                        <td >
                            {{--<img src="{{\Illuminate\Support\Facades\Storage::disk('local')->url($logo->url)}}" width="50px" height="50px">--}}
                            <img src="{{asset('storage/'.$logo->url)}}" width="50px" height="50px">
                            {{--<img src="{{storage_path('app/public'.$logo->url)}}" width="50px" height="50px">--}}
                            {{--<img src="{{$logo->URI}}" width="50px" height="50px">--}}
                        </td>
                        <td >
                            <a data-toggle="modal" data-target="#theModal" data-value="{{$logo->id}}"
                               title="Editar" class="btn btn-xs btn-default text-primary mx-1 shadow btn-edit">
                                <strong><i class="fa fa-edit"></i></strong>
                            </a>
                            <a href="{{route('logos.destroy',['id'=>$logo['id']])}}" class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar" id="" onclick="return confirm('Confirme eliminar');"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach

            </div>

            </tbody>
        </table>
    </div>
