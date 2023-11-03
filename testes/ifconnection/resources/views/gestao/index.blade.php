@extends('templates.Aprincipal', ['titulo' => ($typeUserId === 1) ? 'Trabalhos Orientados' : 'Trabalho de Conclusão de Curso'])
@section('titulo') Gestão TCC @endsection

@section('conteudo')
    <div class="row">
        @foreach ($orientacoes as $orientacao)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <img src="{{ $orientacao->projeto->foto }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
                        <h5 class="card-title">Orientador: {{ $orientacao->professor->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Aluno: {{ $orientacao->aluno->name }}</h6>
                        <p class="card-text">Projeto: {{ $orientacao->projeto->titulo }}</p>
                        <p class="card-text">descrição: {{ $orientacao->projeto->resumo }}</p>
                       
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
