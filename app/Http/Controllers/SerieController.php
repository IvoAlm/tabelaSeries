<?php

namespace App\Http\Controllers;

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
}
