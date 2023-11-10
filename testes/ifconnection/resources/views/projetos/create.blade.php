@extends('templates.Aprincipal', ['titulo' => "Cadastro de projetos"])

@section('titulo') 
   
@endsection

@section('conteudo')
    <form action="{{ route('projetos.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="image" style="color: white;">Foto de capa</label>
            <input type="file" class="form-control-file" style="color: white;" id="foto" name="foto">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Enviar</button>
            <a href="{{ route('projetos.store') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
@endsection
