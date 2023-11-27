@extends('templates.Aprincipal', ['titulo' => ($typeUserId === 1) ? 'Trabalhos Orientados' : 'Gestão TCC'])
@section('titulo') Gestão TCC @endsection

@section('conteudo')
    <div class="row">
        @foreach ($orientacoes as $orientacao)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset($orientacao->projeto->foto) }}" class="card-img-top" alt="{{ $orientacao->projeto->titulo }}">
                    <div class="card-body">
                        <h5 class="card-title">Orientador: {{ $orientacao->professor->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Aluno: {{ $orientacao->aluno->name }}</h6>
                        <p class="card-text"><strong>Projeto:</strong> {{ $orientacao->projeto->titulo }}</p>
                        <p class="card-text"><strong>Descrição:</strong> {{ $orientacao->projeto->resumo }}</p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('gestao.documento', ['id' => $orientacao->id]) }}" class="btn btn-primary btn-block">Documentos</a>
                        <a href="{{ route('gestao.reuniao', ['id' => $orientacao->id]) }}" class="btn btn-warning btn-block">Reuniões</a>
                        <a href="{{ route('gestao.cronograma', ['id' => $orientacao->id]) }}" class="btn btn-info btn-block">Cronograma</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
