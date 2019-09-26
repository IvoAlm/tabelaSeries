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
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" name="nome">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
@endsection
