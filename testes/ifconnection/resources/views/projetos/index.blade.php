@extends('templates.Aprincipal', ['titulo' => "Projetos"])

@section('titulo') 
   
@endsection

@section('conteudo')

    @if ( Auth::user()->type_id === 1)


    <div class="row">
        @foreach($projetos as $projeto)
            <div class="col-md-4">
                <div class="card bg-light" style="width: 18rem; b">
                    <div class="card-body d-flex align-items-center">
                        @if (!empty($projeto->user->image))
                            <img src="{{ $projeto->user->image }}" alt="Foto do Aluno" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #000;">
                        @else
                            <img src="img/profile/semFotoPerfil.png" alt="Foto do Aluno" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #000;">
                        @endif
                        <p class="ml-3" style="margin-top: 15px; margin-left: 10px">{{ $projeto->user->name }}</p> <!-- Ajuste de margem para alinhamento vertical -->
                    </div>
                    <div class="card-body d-flex align-items-center"> 
                        <h3 class="card-title">{{ $projeto->titulo }}</h3>
                    </div>
                    <img src="{{ $projeto->foto }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Descrição:</h5>

                        <p class="card-text">{{ $projeto->resumo }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    
    

    @else
    @if($projetos->isEmpty())
    <p>Não existem projetos cadastrados.</p>
        @else
    <div class="row">
        @foreach($projetos as $projeto)
            @if($projeto->user_id == auth()->user()->id)
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        @if ($projeto->foto)
                            <img src="{{ asset($projeto->foto) }}" alt="Foto do Projeto">
                        @endif
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
    @endif

    

    
@endsection
