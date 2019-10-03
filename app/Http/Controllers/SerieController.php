<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Services\CriadorDeSerie;
use App\Temporada;
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

    public function store(SeriesFormRequest $request, CriadorDeSerie  $criadorDeSerie)
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome,
            $request->qnt_temporadas,
            $request->ep_por_temporada
        );

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
