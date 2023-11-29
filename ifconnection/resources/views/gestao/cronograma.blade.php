@extends('templates.Aprincipal', ['titulo' => 'Cronograma'])

@section('titulo') Cronograma TCC @endsection

@section('conteudo')
    <a href="{{ route('cronograma.cadastrar', ['id' => $id]) }}" class="btn btn-primary mb-3">Adicionar Tarefa</a>
    <a href="{{ route('gestao.index') }}" class="btn btn-secondary mb-3">Voltar</a>

    <div class="bg-white rounded p-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Data de entrega</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cronogramas as $tarefa)
                    <tr>
                        <td>{{ $tarefa->tarefa }}</td>
                        <td>{{ $tarefa->data }}</td>
                        <td>
                            <a href="{{ route('cronograma.editar', ['id' => $tarefa->id]) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('cronograma.excluir', ['id' => $id, 'cronogramaId' => $tarefa->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
