@extends('templates.Aprincipal', ['titulo' => 'Editar Tarefa do Cronograma'])

@section('titulo') Editar Tarefa @endsection

@section('conteudo')
    <div class="bg-white rounded p-4">
        <form action="{{ route('cronograma.atualizar', ['id' => $cronograma->id, ]) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tarefa">Tarefa:</label>
                <input type="text" class="form-control" id="tarefa" name="tarefa" value="{{ $cronograma->tarefa }}" required>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" value="{{ $cronograma->data }}" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
                <a href="{{ route('gestao.cronograma', ['id' => $cronograma->orientacao_id]) }}" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
@endsection
