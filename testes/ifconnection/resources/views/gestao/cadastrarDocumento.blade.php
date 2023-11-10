@extends('templates.Aprincipal', ['titulo' => 'Cadastro de Documentos'])

@section('titulo') Cadastro de Documentos @endsection

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('documento.salvar') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input type="hidden" name="orientacao_id" value="{{ $id }}">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="file" id="documento" name="documento" class="form-control">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Documento</button>
            </div>
        </form>

        <a href="{{ route('gestao.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
