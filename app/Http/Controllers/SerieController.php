<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index(Request $request)
    {
        $escritas = [
            'Serie1',
            'Serie2',
            'Serie3',
            'Serie4'
        ];

        return view('series.index',compact('escritas'));
    }

    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
//        Poderiamos add o $nome=request->get('nome');
//        mas por padrão o laravel já usa o get quando tentamos
//        acessar um atributo que ele não reconhece
        $nome = $request->nome;
        $serie = new Serie();
        $serie->nome = $nome;
        var_dump($serie->save());

    }
}
