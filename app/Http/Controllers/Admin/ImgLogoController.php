<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clubes;
use App\Models\Admin\Comunidad;
use App\Models\Admin\ImgLogo;
use App\Models\Admin\Provincia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class ImgLogoController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $logosAux = ImgLogo::all();
        $logos = collect();
        foreach ($logosAux as $logo)
        {
            $club = Clubes::where('CodClub',$logo->club_code)->first();
            if (!empty($club))
            {
                $logo->club = $club->Club;
                $logo->URI = Storage::disk('local')->url($club->url);;
                $logos->push($logo);
            }

        }
        return view('admin.img-logo.index', compact('logos'));
    }

    public function create()
    {
        $clubes = Clubes::all()->sortBy('CodClub');
        return view('admin.img-logo.fields', compact('clubes'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        // guardar img
        $imgLogo = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgLogo = $img->store('assets/img/img_logo', 'public');
        }

        $logo = ImgLogo::create([
            'club_code'=>$input['club_code'],
            'url'=>$imgLogo
        ]);

        return $logo;
    }

    public function edit($id)
    {
        $clubes = Clubes::all()/*->sortBy('CodClub')*/;
        $logo = ImgLogo::find($id);
        if (empty($logo)) {
            Flash::error('Logo no encontrado');
            return redirect(route('logos.index'));
        }

        return view('admin.img-logo.fields-edit', compact('logo', 'clubes'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $logo = ImgLogo::find($input['id']);
        if (empty($logo)) {
            Flash::error('Logo no encontrado');
            return redirect(route('logos.index'));
        };

        // Borrar imagen anterior
        $this->deleteImg($logo->url);

        // guardar img
        $imgLogo = null;
        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $imgLogo = $img->store('assets/img/img_logo', 'public');
        }

       // $logo->club_code = $input['club_code'];
        $logo->url = $imgLogo;

        $logo->save();
    }

    public function destroy($id)
    {
        $logo = ImgLogo::find($id);
        if (empty($logo)) {
            Flash::error('Logo no encontrado');
            return redirect(route('logos.index'));
        }

        $this->deleteImg($logo->url);

        // Borrando logo
        $logo->delete();

        Flash::success('Logo eliminado satisfactoriamente.');
        return redirect(route('logos.index'));
    }

    private function deleteImg($url)
    {
        //Borrando imagen
        if (Storage::disk('public')->exists($url)) {
            Storage::disk('public')->delete($url);
        }
    }
}
