@extends('templates.adminPrincipal', ['titulo' => "Materias"])

@section('titulo') Materias @endsection

@section('conteudo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

 <h1>Cadastro de Matérias</h1>

<a href="{{ route('materias.create') }}" class="btn btn-primary">Adicionar matérias</a>

<table class="table">

    
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>

        </tr>
    </thead>
    <tbody>
        @foreach($materias as $materia)
            <tr>
                <td>{{ $materia->id }}</td>
                <td>{{ $materia->nome }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>



@endsection