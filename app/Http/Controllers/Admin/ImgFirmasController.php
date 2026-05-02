<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clubes;
use App\Models\Admin\Comunidad;
use App\Models\Admin\FederacionTerritorial;
use App\Models\Admin\ImgFirmas;
use App\Models\Admin\ImgLogo;
use App\Models\Admin\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class ImgFirmasController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $firmas = ImgFirmas::all()->sortByDesc('id');

        foreach ($firmas as $firma)
        {
            $fed = FederacionTerritorial::where('IdFed',$firma->id_fed)->first();
            $firma->federacion = $fed->Federacion;
        }

        return view('admin.firmas.index', compact('firmas'));
    }

    public function create()
    {
        $federaciones = FederacionTerritorial::all();
        return view('admin.firmas.fields', compact('federaciones'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // guardar img
        $imgFirma = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgFirma = $img->store('assets/img/firmas', 'public');
        }

        $firma = ImgFirmas::create([
            'id_fed'=>$input['id_fed'],
            'url'=>$imgFirma
        ]);

        return $firma;
    }

    public function edit($id)
    {
        $federaciones = FederacionTerritorial::all();
        $firma = ImgFirmas::find($id);
        if (empty($firma)) {
            Flash::error('Firma no encontrado');
            return redirect(route('firmas.index'));
        }

        return view('admin.firmas.fields-edit', compact('firma', 'federaciones'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $firma = ImgFirmas::find($input['id']);
        if (empty($firma)) {
            Flash::error('Firma no encontrada');
            return redirect(route('firmas.index'));
        }

        // Borrar imagen anterior
        $this->deleteImg($firma->url);

        // guardar img
        $imgFirma = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgFirma = $img->store('assets/img/firmas', 'public');
        }

        $firma->url = $imgFirma;

        $firma->save();
    }

    public function destroy($id)
    {
        $firma = ImgFirmas::find($id);
        if (empty($firma)) {
            Flash::error('Firma no encontrado');
            return redirect(route('firmas.index'));
        }

        $this->deleteImg($firma->url);

        // Borrando logo
        $firma->delete();

        Flash::success('Firma eliminada satisfactoriamente.');
        return redirect(route('firmas.index'));
    }

    private function deleteImg($url)
    {
        //Borrando imagen
        if (Storage::disk('public')->exists($url)) {
            Storage::disk('public')->delete($url);
        }
    }
}
