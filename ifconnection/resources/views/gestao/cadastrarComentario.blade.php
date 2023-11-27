@extends('templates.Aprincipal', ['titulo' => 'Cadastro de Comentários'])

@section('titulo') Cadastro de Comentário @endsection

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('documento.salvarComentario', ['id' => $id]) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="nome" class="form-label">Comentário:</label>
                <input type="text" id="comentario" name="comentario" class="form-control" value="{{ $comentarioExistente }}">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Comentário</button>
            </div>
        </form>

        <a href="{{ route('gestao.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
