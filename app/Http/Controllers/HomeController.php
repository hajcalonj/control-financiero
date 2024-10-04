<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function perfil()
    {
        // Obtener el usuario con id igual a 2
        $usuario = User::where('id', 2)->first();

        // Verificar si el usuario existe
        if ($usuario) {
            // Pasar el usuario a la vista
            return view('/user/perfil', ['usuario' => $usuario]);
        } else {
            // Manejar el caso en que el usuario no exista
            return abort(404); // Puedes personalizar esto según tus necesidades
        }
    }

    public function usuarios()
    {
        $usuario = User::all();

        return view('/user/users', ['usuario' => $usuario]);
    }
}
