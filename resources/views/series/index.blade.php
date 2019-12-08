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
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

            <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
                <input type="text" class="form-control" value="{{ $serie->nome }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                        <i class="fas fa-check"></i>
                    </button>
                    @csrf
                </div>
            </div>
            <div class="d-flex">
                <button class="btn btn-info btn-sm mr-1" onclick="toggleInput({{ $serie->id }})">
                    <i class="fas fa-edit"></i>
                </button>
                <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">
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
    <script>
        function toggleInput($serieId) {

            const nomeSerieEl = document.getElementById('nome-serie-' + $serieId);
            const inputSerieEl = document.getElementById('input-nome-serie-' + $serieId);

            if (nomeSerieEl.hasAttribute('hidden')) {
                nomeSerieEl.removeAttribute('hidden');
                inputSerieEl.hidden = true;
            } else {
                inputSerieEl.removeAttribute('hidden');
                nomeSerieEl.hidden = true;
            }

        }
    </script>
@endsection
