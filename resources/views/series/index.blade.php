@extends('layout')
@section('cabecalho')
Séries
@endsection
@section('conteudo')
    <a href="/series/create" class="btn btn-primary btn-lg mb-2">Adicionar</a>
    <ul class="list-group">
        <?php foreach ($escritas as $escrita): ?>
            <li class="list-group-item"><?= $escrita ?></li>
        <?php endforeach; ?>
    </ul>
@endsection
