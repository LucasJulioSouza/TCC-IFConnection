@extends('templates.Aprincipal', ['titulo' => 'Documentos'])

@section('titulo') Documentos TCC  @endsection

@section('conteudo')

<a href="{{ route('documento.cadastrar', ['id' => $id]) }}" class="btn btn-primary">Adicionar Documento</a>

<div class="row mt-4">
    @foreach ($documentos as $documento)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $documento->nome }}</h5>
                    <p class="card-text">{{ $documento->descricao }}</p>
                    <a href="{{ route('documento.download', ['id' => $documento->id]) }}" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
