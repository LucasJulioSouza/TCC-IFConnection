@extends('templates.Aprincipal', ['titulo' => "Projetos"])

@section('titulo') 
   
@endsection

@section('conteudo')

    @if($projetos->isEmpty())
        <p>Não existem projetos cadastrados.</p>
    @else
        <div class="row">
            @foreach($projetos as $projeto)
                @if($projeto->user_id == auth()->user()->id)
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ $projeto->foto }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $projeto->titulo }}</h5>
                                <p class="card-text">{{ $projeto->resumo }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('projetos.edit', $projeto->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('projetos.destroy', $projeto->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Excluir</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif

    <div class="mt-4">
        <a href="{{ route('projetos.create') }}" class="btn btn-success">Adicionar projeto</a>
    </div>
@endsection
