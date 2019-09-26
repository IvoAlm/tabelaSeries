<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SerieController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();
        $mensagem = $request->session()
            ->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {

        //pega todos os dados do formulario no request e os manda para Serie.

        $serie = Serie::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                'Série com id ' . $serie->id . ' e nome ' . $serie->nome . ' criada com sucesso'
            );

        return redirect()->route('series.index');

    }

    public function destroy(Request $request)
    {
        $serie = Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                'A série de id ' . $request->id . ' foi exlcuida com sucesso'
            );

        return redirect()->route('series.index');
    }
}
