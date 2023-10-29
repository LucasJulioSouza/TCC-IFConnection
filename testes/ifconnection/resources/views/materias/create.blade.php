@extends('templates.adminPrincipal', ['titulo' => "Cadastro de Materias"])

@section('titulo') 
   

@section('conteudo')
    <form action="{{ route('materias.store') }}" method="POST" >
        @csrf
       
        <div class="form-group">
            <label for="titulo">Nome da materia</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da materia">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
            <a href="{{ route('materias.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
@endsection
