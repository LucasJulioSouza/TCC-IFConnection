@extends('templates.Aprincipal', ['titulo' => 'Editar Projeto'])

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('projetos.update', $projeto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $projeto->titulo }}">
            </div>

            <div class="mb-3">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea class="form-control" id="resumo" name="resumo" rows="3">{{ $projeto->resumo }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="foto" class="form-label" style="color: white;">Foto de capa</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="inputGroupFileAddon">
                    
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                <a href="{{ route('projetos.index') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
