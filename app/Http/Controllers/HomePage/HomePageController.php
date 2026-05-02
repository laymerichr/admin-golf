<?php

namespace App\Http\Controllers\HomePage;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class HomePageController
 * @package App\Http\Controllers\HomePage
 */
class HomePageController extends Controller
{
    /**
     * HomePageController constructor.
     */
    public function __construct()
    {

    }
    /**
     * index()
     * Mostrar el home del admin con el idioma por defecto del usuario logueado
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        /**
         * Change for Default Language
         */
        $user = User::find(Auth::user()->id);

        return view('homepage.home', compact('user'));
    }

    /**
     * welcome()
     * Show LandingPage
     */
    public function welcome()
    {
        return redirect(route('login'));
    }
}
