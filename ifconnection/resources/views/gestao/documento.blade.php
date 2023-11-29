@extends('templates.Aprincipal', ['titulo' => 'Documentos'])

@section('titulo') Documentos TCC  @endsection

@section('conteudo')

<a href="{{ route('documento.cadastrar', ['id' => $id]) }}" class="btn btn-primary">Adicionar Documento</a>
<a href="{{ route('gestao.index') }}" class="btn btn-secondary">Voltar</a>

<div class="row mt-4">
    @foreach ($documentos as $documento)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $documento->nome }}</h5>
                    <div class="mb-2">
                        <strong>Descrição:</strong> {{ $documento->descricao }}
                    </div>
                    <div class="mb-2">
                        <strong>Comentário:</strong> {{ $documento->comentario}}
                    </div>

                    @if ($documento->comentario)
                        <a href="{{ route('documento.novoComentario', ['id' => $documento->id]) }}" class="btn btn-secondary">Editar Comentário</a>
                    @else
                        <a href="{{ route('documento.novoComentario', ['id' => $documento->id]) }}" class="btn btn-success">Adicionar Comentário</a>
                    @endif

                    <a href="{{ route('documento.download', ['id' => $documento->id]) }}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
