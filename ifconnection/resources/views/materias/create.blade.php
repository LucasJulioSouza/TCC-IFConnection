@extends('templates.adminPrincipal', ['titulo' => "Cadastro de Materias"])

@section('titulo')


@section('conteudo')

    <div class="card p-4">
    <form action="{{ route('materias.store') }}" method="POST" >
        @csrf

        <div class="mb-3">
            <label for="titulo">Nome da materia</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da materia">
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary" >Cadastrar</button>
            <a href="{{ route('materias.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

</div>
@endsection
