@extends('templates.Aprincipal', ['titulo' => 'Cadastro de Reuniões'])

@section('titulo') Cadastro de Reuniões @endsection

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('reuniao.salvar') }}" method="post" >
            @csrf

            <input type="hidden" name="orientacao_id" value="{{ $id }}">

            <div class="mb-3">
                <label for="nome" class="form-label">Tema:</label>
                <input type="text" id="nome" name="tema" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">link de acesso:</label>
                <textarea id="descricao" name="link" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Reunião</button>
            </div>
        </form>

        <a href="{{ route('gestao.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
