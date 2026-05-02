<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clubes;
use App\Models\Admin\Comunidad;
use App\Models\Admin\Provincia;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ClubController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $clubes = Clubes::with('provincia')->get()->sortBy('CodClub');
        foreach ($clubes as $item)
        {
            $provincia = Provincia::where('IdProvincia',$item->IdProvincia)->first();
            $comunidad = Comunidad::where('IdComunidad',$item->IdComunidad)->first();

            $item->Provincia = $provincia->Provincia ?? '';
            $item->Comunidad = $comunidad->Comunidad ?? '';
        }

        return view('admin.club.index', compact('clubes'));
    }

    public function create()
    {
        $provincias = Provincia::all();
        return view('admin.club.fields', compact('provincias'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $id_comunidad = Provincia::where('IdProvincia',$input['IdProvincia'])->first()->IdComunidad;

        $club = Clubes::create(
            [
                'CodClub'=>$input['CodClub'],
                'Club'=>$input['Club'],
                'IdProvincia'=>$input['IdProvincia'],
                'IdComunidad'=>$id_comunidad,
                'Becado'=> $request->has('Becado') ? true : false,
                'Direccion'=>$input['Direccion'],
                'CodPostal'=>$input['CodPostal'],
                'Telefono'=>$input['Telefono'],
                'Fax'=>$input['Fax'],
                'Email'=>$input['Email'],
                'GPS'=>$input['GPS'],
                'Web'=>$input['Web'],
                'Presidente'=>$input['Presidente'],
                'Persona_Contacto'=>null,
                'Persona_Cargo'=>null,
                'Campo'=> $request->has('Campo') ? true : false,
                'url_inscripcion_fc'=>null,
                'Golf_Colegios'=>null,
                'IdIsla'=>null,
                'id'=>random_int(1, PHP_INT_MAX),
            ]
        );

        return $club;
    }

    public function edit($id)
    {
        $club = Clubes::where('CodClub',$id)->first();
        if (empty($club)) {
            Flash::error('Club no encontrado');
            return redirect(route('clubes.index'));
        }

        $provincias = Provincia::all();
        return view('admin.club.fields_edit', compact('club','provincias'));
    }

    public function update(Request $request)
    {
        $club = Clubes::where('CodClub',$request->id)->first();
        if (empty($club)) {
            Flash::error('Club no encontrado');
            return redirect(route('clubes.index'));
        }

        $id_comunidad = Provincia::where('IdProvincia',$request->IdProvincia)->first()->IdComunidad;

        Clubes::where('CodClub', '=', $request->id)
            ->update(
                [
                    'CodClub' => $request->CodClub,
                    'Club' => $request->Club,
                    'IdProvincia' => $request->IdProvincia,
                    'IdComunidad' => $id_comunidad,
                    'Becado' => ($request->Becado) ? true : false,
                    'Direccion' => $request->Direccion,
                    'CodPostal' => $request->CodPostal,
                    'Telefono' => $request->Telefono,
                    'Fax' => $request->Fax,
                    'Email' => $request->Email,
                    'GPS' => $request->GPS,
                    'Web' => $request->Web,
                    'Presidente' => $request->Presidente,
                    'Persona_Contacto' => null,
                    'Persona_Cargo' => null,
                    'Campo' => ($request->Campo) ? true : false,
                    'url_inscripcion_fc' => null,
                    'Golf_Colegios' => null,
                    'IdIsla' => null
                ]
            );

    }

    public function destroy($id)
    {
        $club = Clubes::where('CodClub',$id)->first();
        if (empty($club)) {
            Flash::error('Club no encontrado');
            return redirect(route('clubes.index'));
        }

        Clubes::where('CodClub',$id)->delete();
        Flash::success('Club eliminado satisfactoriamente.');
        return redirect(route('clubes.index'));
    }
}