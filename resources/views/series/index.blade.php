@extends('layout')
@section('cabecalho')
Séries
@endsection
@section('conteudo')
    @if($mensagem)
    <div class="alert alert-success">
        {{$mensagem}}
    </div>
    @endif

    <a href="{{ route('criar_serie') }}" class="btn btn-primary btn-lg mb-2">Adicionar</a>
    <ul class="list-group">
        <?php foreach ($series as $serie): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->nome}}
                <form action="/series/{{ $serie->id }}" method="post" onclick="confirm('Tem certeza que quer apagar?')">
                    @csrf
                    @method('DELETE')
                    <button  class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </li>

        <?php endforeach; ?>
    </ul>
@endsection
