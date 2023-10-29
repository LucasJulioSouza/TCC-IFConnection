@extends('templates.Aprincipal', ['titulo' => "Principal"])

@section('titulo') Principal @endsection

@section('conteudo')
<div style="background-color: white; padding: 20px;">
    <h2>Solicitações de Orientação</h2>
    
    <div class="row">
        @foreach($solicitacoes as $solicitacao)
            <div class="col-md-4">
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Projeto: {{ $solicitacao->projeto->titulo }}</h5>
                        <p class="card-text">Solicitante: {{ $solicitacao->aluno->name }}</p>
                        
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
