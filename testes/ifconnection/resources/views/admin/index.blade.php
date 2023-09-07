@extends('templates.adminPrincipal', ['titulo' => "Principal"])

@section('titulo') Principal @endsection

@section('conteudo')

<div class="container">
    <h1>Usuários Cadastrados</h1>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <!-- Adicione outras colunas conforme necessário -->
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <!-- Adicione outras colunas conforme necessário -->
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection