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
        @foreach ($series as $serie)
        <li class="list-group-item d-flex justify-content-between align-items-center">{{$serie->nome}}
            <div class="d-flex">
                <a href="/series/{{$serie->id}}/temporadas" class="btn btn-info btn-sm mr-1">
                    <i class="fas fa-external-link-alt"></i>
                </a>
                <form action="/series/{{ $serie->id }}" method="post" onclick="confirm('Tem certeza que quer apagar?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </form>
            </div>
        </li>


        @endforeach
    </ul>
@endsection
