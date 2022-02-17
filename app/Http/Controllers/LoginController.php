<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function panel(Request $datos)
    {
        $usuario = Usuario::where('nombre', '=', $datos->usuario)->first();
        $noticias = Noticia::where('autor_id', '=', $usuario->id)->orderby('updated_at')->Paginate(5); //paginado de 5 en 5
        return view('login.panel', compact('usuario'), compact('noticias'));
    }

    public function create()
    {
        return view('login.create');
    }

    public function show()
    {
    }

    public function destroy(noticia $noticia)
    {
        return view('login.destroy', compact('noticia'));
    }
    public function update($idnoticia)
    {
        return view('login.update', compact('noticia'));
    }

    public function showNot()
    {
        # code...
    }
}