<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()
        ->orderBy('nome')
        ->get();
        $mensagem = $request->session()
            ->get('mensagem');

        return view('series.index',compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
//      pega todos os dados do formulario no request e os manda para Serie.

        $serie = Serie::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                'Série com id '.$serie->id.' e nome '.$serie->nome.' criada com sucesso'
            );

        return redirect('/series');

    }
}
