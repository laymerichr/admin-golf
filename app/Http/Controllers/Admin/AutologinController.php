<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AutologinController extends Controller
{
    public function __construct()
    {
    }

    public function escuelasJuveniles(){
        $user=Auth::user()->name;
        $password=session('password');
        $code = Auth::user()->NombreWeb;
        $token = csrf_token();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(/*'https://'.*/env('ESCUELAS_JUVENILES') . '/api/login', [
            'user' => $user,
            'password' => $password,
        ]);

        if ($response->status() === 200) {
            // Redireccionar con parámetros a un segundo sitio
            return redirect()->away(/*'https://'.*/env('ESCUELAS_JUVENILES').'?user=' . $user . '&password=' . $password. '&_token='. $token. '&code='. $code);
        } else {
            return 'Error: '. $response->status();
        }
    }

    public function colectivos(){
        $user=Auth::user()->name;
        $password=session('password');
        $token = csrf_token();
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(/*'https://'.*/env('COLECTIVOS') . '/api/login', [
            'user' => $user,
            'password' => $password,
        ]);

        if ($response->status() === 200) {
            // Si la autenticación es exitosa, redirige al usuario
            return redirect()->away(/*'https://'.*/env('COLECTIVOS').'?user=' . $user . '&password=' . $password. '&_token='. $token);
        } else {
            return 'Error: ' . $response->status();
        }
    }

    public function facturacion(){
        $user=Auth::user()->name;
        $password=session('password');
        $token = csrf_token();
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(/*'https://'.*/env('FACTURACION') . '/api/login', [
            'user' => $user,
            'password' => $password,
        ]);

        if ($response->status() === 200) {
            // Si la autenticación es exitosa, redirige al usuario
            return redirect()->away(/*'https://'.*/env('FACTURACION').'?user=' . $user . '&password=' . $password. '&_token='. $token);
        } else {
            return 'Error: ' . $response->status();
        }
    }

    public function panelControl(){
        $user=Auth::user()->name;
        $password=session('password');
        $code = Auth::user()->NombreWeb;
        $token = csrf_token();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(/*'https://'.*/env('ESTADISTICAS') . '/api/login', [
            'user' => $user,
            'password' => $password,
        ]);

        if ($response->status() === 200) {
            // Redireccionar con parámetros a un segundo sitio
            return redirect()->away(/*'https://'.*/env('ESTADISTICAS').'?user=' . $user . '&password=' . $password. '&_token='. $token. '&code='. $code);
        } else {
            return 'Error: '. $response->status();
        }
    }

    public function federaciones(){
        $user=Auth::user()->name;
        $password=session('password');

        // $user=session('email');
        // $response = Http::post('http://'.env('COLECTIVOS').'/api/login', [
        /*  $response = Http::post('http://'.env('COLECTIVOS').'/home/get-login', [
              'txtUsuario' => $user,
              'txtPassword' => $password,
          ]);*/

        $response = Http::get('http://'.env('FEDERACIONES')
        );

        $token = csrf_token();

        if ($response->status() === 200) {
            // Redireccionar con parámetros a un segundo sitio
            return redirect()->away('http://'.env('FEDERACIONES').'?user=' . $user . '&password=' . $password. '&_token='. $token);
        } else {
            return 'Error: '. $response->status();
        }
    }
}
