@extends('templates.Aprincipal', ['titulo' => "Editar Projeto"])

@section('titulo')
   
@endsection

@section('conteudo')
    <form action="{{ route('projetos.update', $projeto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $projeto->titulo }}">
        </div>

        <div class="form-group">
            <label for="resumo">Resumo:</label>
            <textarea class="form-control" id="resumo" name="resumo" rows="3">{{ $projeto->resumo }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="foto">Foto:</label>
            <input type="text" class="form-control" id="foto" name="foto" value="{{ $projeto->foto }}">
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" class="btn btn-primary mr-2">Salvar</button>
            <a href="{{ route('projetos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
@endsection
