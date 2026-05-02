<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Escuelas;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class EscuelaController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $escuelas = Escuelas::with('federacion')->get()->sortBy('CodClub');
        return view('admin.escuela.index', compact('escuelas'));
    }

    public function create()
    {

    }

    public function edit($id)
    {
        $escuela = Escuelas::where('NombreWeb',$id)->first();
        if (empty($escuela)) {
            Flash::error('Escuela no encontrada');
            return redirect(route('escuelas.index'));
        }
    }

    public function update(Request $request)
    {
        $escuela = Escuelas::where('NombreWeb',$request->id)->first();
        if (empty($escuela)) {
            Flash::error('Escuela no encontrada');
            return redirect(route('escuelas.index'));
        }

    }

    public function destroy($id)
    {
        $escuela = Escuelas::where('NombreWeb',$id)->first();
        if (empty($escuela)) {
            Flash::error('Escuela no encontrada');
            return redirect(route('escuelas.index'));
        }
        $escuela->delete();
        Flash::success('Escuela eliminada satisfactoriamente.');
        return redirect(route('escuelas.index'));

    }

    public function enableDisable($id)
    {
        $escuela = Escuelas::where('NombreWeb',$id)->first();
        if (empty($escuela)) {
            Flash::error('Escuela no encontrada');
            return redirect(route('escuelas.index'));
        }

        // Habilitando-Deshabilitando segun estado
        $activo = !$escuela->Activo;

        Escuelas::where('NombreWeb',$id)->update(array('Activo' => $activo));

        if ($activo)
          Flash::success('Escuela activada satisfactoriamente.');
        else
          Flash::success('Escuela desactivada satisfactoriamente.');

        return redirect(route('escuelas.index'));
    }
}