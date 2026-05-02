<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Correo;
use App\Models\Admin\ImgLogo;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class CorreoController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $correos = Correo::all();
        return view('admin.correo.index', compact('correos'));
    }

    public function create()
    {
        return view('admin.correo.fields');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $correo = Correo::create([
            'email'=>$input['email']
        ]);

        return $correo;
    }

    public function edit($id)
    {
        $correo = Correo::find($id);
        if (empty($correo)) {
            Flash::error('Correo no encontrado');
            return redirect(route('correos.index'));
        }

        return view('admin.correo.fields-edit', compact('correo'));
    }

    public function update(Request $request)
    {
       // $input = $request->all();
        $correo = Correo::find($request->id);
        if (empty($correo)) {
            Flash::error('Correo no encontrado');
            return redirect(route('correos.index'));
        };

        $correo->email = $request->email;
        $correo->save();
    }

    public function destroy($id)
    {
        $correo = Correo::find($id);
        if (empty($correo)) {
            Flash::error('Correo no encontrado');
            return redirect(route('correos.index'));
        }
        $correo->delete();

        Flash::success('Correo eliminado satisfactoriamente.');
        return redirect(route('correos.index'));
    }
}
