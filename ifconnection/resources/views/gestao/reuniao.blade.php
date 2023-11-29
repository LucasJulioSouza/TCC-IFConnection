@extends('templates.Aprincipal', ['titulo' => 'Reuniões'])

@section('titulo') Reuniões TCC  @endsection

@section('conteudo')

<a href="{{ route('reuniao.cadastrar', ['id' => $id]) }}" class="btn btn-primary">Adicionar Reunião</a>
<a href="{{ route('gestao.index') }}" class="btn btn-secondary">Voltar</a>

<div class="row mt-4">
    @foreach ($reunioes as $reuniao)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $reuniao->tema }}</h5>
                    <div class="mb-2">
                        <strong>Data:</strong> {{ $reuniao->data }}
                    </div>
                    <div class="mb-2">
                        <strong>Temas discutidos:</strong> {{ $reuniao->ata }}
                    </div>

                    <a href="{{ route('reuniao.cadastrarAta', ['id' => $reuniao->id]) }}" class="btn btn-primary">Cadastrar tema</a>
                    <a href="{{ $reuniao->link }}" target="_blank" class="btn btn-secondary">Abrir Reunião</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
