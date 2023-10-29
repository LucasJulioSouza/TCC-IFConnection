@extends('templates.Aprincipal', ['titulo' => "Edição de Matérias"])

@section('titulo', 'Edição de Matérias')
@section('conteudo')

<style>
    /* Estilo para as células da tabela */
    table th, table td {
        color: black; /* Texto preto */
    }
</style>

<div class="container">
    <h1 style="color: white;">Editar Matérias do Professor</h1>
    <p style="color: white;">Nome do Professor: {{ $user->name }}</p>

    <form method="post" action="{{ route('materiasProfessor.update', ['userId' => $user->id]) }}">
        @csrf
        @method('put')

        <table class="table" style="background-color: white;"> <!-- Fundo da tabela branco -->
            <thead>
                <tr>
                    <th>Matéria</th>
                    <th>Associada</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->materias as $materia)
                    <tr>
                        <td>{{ $materia->nome }}</td>
                        <td>
                            <input type="checkbox" name="materias[]" value="{{ $materia->id }}" checked>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="{{ route('professores.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

@endsection
