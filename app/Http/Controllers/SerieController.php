<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SerieController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::all();

        return view('series.index',compact('series'));
    }

    public function create()
    {
        return view('series.create');
    }
    public function store(Request $request)
    {
//      pega todos os dados do formulario no request e os manda para Serie.

        $serie = Serie::create($request->all());
        echo "Série com id ($serie->id) criada: ($serie->nome)";

    }
}
