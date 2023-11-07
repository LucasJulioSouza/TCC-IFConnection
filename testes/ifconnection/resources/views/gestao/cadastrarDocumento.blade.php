@extends('templates.Aprincipal', ['titulo' => 'Cadastro de Documentos'])

@section('titulo') Cadastro de Documentos @endsection

@section('conteudo')
    <form action="{{ route('documento.salvar') }}" method="post" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="orientacao_id" value="{{ $id }}">
        
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome">
        
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"></textarea>
        
        <label for="documento">Documento:</label>
        <input type="file" id="documento" name="documento">
        
        <button type="submit">Salvar Documento</button>
    </form>
@endsection
