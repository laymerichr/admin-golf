<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Clubes;
use App\Models\Admin\Colectivos;
use App\Models\Admin\FcupProximosTorneos;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomeAdminController
 * @package App\Http\Controllers\Admin
 */
class HomeAdminController extends Controller
{
    /**
     * HomeAdminController constructor.
     */
    public function __construct()
    {

    }

    /**
     * index()
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws Exception
     */
    public function index()
    {
        $usersCount = User::all()->count();
        $clubsCount = Clubes::all()->count();
        $fcCount = FcupProximosTorneos::all()->count();
        $colectivosCount = Colectivos::all()->count();
       return view('admin.index', compact('usersCount', 'clubsCount', 'fcCount', 'colectivosCount'));
    }

    public function loginOutForce()
    {
        session()->flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
