<?php

namespace App\Http\Controllers;

use App\Serie;
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

    public function store(SeriesFormRequest $request)
    {

        $serie = Serie::create(['nome' => $request->nome]);
        $qntTemporadas = $request->qnt_temporadas;
        for ($i = 1; $i <= $qntTemporadas; $i++) {
           $temporada = $serie->temporadas()->create(['numero' => $i]);

            for($j = 1; $j <= $request->ep_por_temporada; $j++){
               $temporada->episodios()->create(['numero'=> $j]);
            }
        }
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
