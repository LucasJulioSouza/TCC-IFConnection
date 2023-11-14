@extends('templates.Aprincipal', ['titulo' => 'Adicionar Tarefa ao Cronograma'])

@section('titulo') Adicionar Tarefa @endsection

@section('conteudo')
    <div class="bg-white rounded p-4">
        <form action="{{ route('cronograma.salvar', ['id' => $id]) }}" method="post">
            @csrf

            <div class="form-group">
                <label for="tarefa">Tarefa:</label>
                <input type="text" class="form-control" id="tarefa" name="tarefa" required>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
                <a href="{{ route('gestao.cronograma', ['id' => $id]) }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
