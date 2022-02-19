<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $noticias = Noticia::paginate(9);
        $categorias = Categoria::all();
        return view('index', compact('noticias', 'categorias'));
    }

    public function show($id){
        $noticia = Noticia::find($id);
        $categorias = Categoria::all();
        $autores = Usuario::all();
        return view('show', compact('noticia', 'categorias','autores'));
    }
    
    public function categoria($idcategoria)
    {
        $noticias = Noticia::where('categoria_id','=', $idcategoria)->paginate(9);
        $categorias = Categoria::all();
        return view('index', compact('noticias', 'categorias'));
    }


}
