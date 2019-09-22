@extends('layout')
@section('cabecalho')
Séries
@endsection
@section('conteudo')
    <a href="/series/create" class="btn btn-primary btn-lg mb-2">Adicionar</a>
    <ul class="list-group">
        <?php foreach ($series as $serie): ?>
            <li class="list-group-item">{{$serie->nome}}</li>
        <?php endforeach; ?>
    </ul>
@endsection
