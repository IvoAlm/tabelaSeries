@extends('layout')
@section('cabecalho')
    Adicionar Série
@endsection
@section('conteudo')
    <form method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-8">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name="nome">
            </div>
            <div class="col-2">
                <label for="qnt_temporadas">Nº de Temporadas</label>
                <input type="number" class="form-control" name="qnt_temporadas">
            </div>
            <div class="col-2">
                <label for="ep_por_temporada">Ep. por Temporada</label>
                <input type="number" class="form-control" name="ep_por_temporada">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection
