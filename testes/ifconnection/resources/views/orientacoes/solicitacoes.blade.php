@extends('templates.Aprincipal', ['titulo' => "Solicitações de Orientação"])

@section('titulo') Orientação @endsection

@section('conteudo')
    <div style="background-color: white; padding: 20px;">

        <div class="row">
            @foreach($solicitacoes as $solicitacao)
                <div class="col-md-3">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            
                            <img src="{{ $solicitacao->projeto->foto }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
                            <h5 class="card-title">Projeto: {{ $solicitacao->projeto->titulo }}</h5>
                            <p class="card-text">Solicitante: {{ $solicitacao->aluno->name }}</p>
                            
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="{{ route('orientacoes.aceitar', ['orientacao' => $solicitacao->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success">Aceitar</button>
                                </form>

                                <form method="POST" action="{{ route('orientacoes.recusar', ['orientacao' => $solicitacao->id]) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Recusar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
