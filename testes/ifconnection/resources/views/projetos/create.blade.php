@extends('templates.Aprincipal', ['titulo' => "Cadastro de projetos"])

@section('titulo') 
   
@endsection

@section('conteudo')
    <form action="{{ route('projetos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do projeto">
        </div>

        <div class="form-group">
            <label for="resumo">Resumo:</label>
            <textarea class="form-control" id="resumo" name="resumo" rows="3" placeholder="Digite o resumo do projeto"></textarea>
        </div>

        <div class="form-group">
            <label for="resumo">foto:</label>
            <textarea class="form-control" id="foto" name="foto" rows="3" placeholder="Digite a URL da foto"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Enviar</button>
        </div>
    </form>
@endsection
