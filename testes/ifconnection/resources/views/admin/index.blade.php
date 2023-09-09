@extends('templates.adminPrincipal', ['titulo' => "Principal"])

@section('titulo') Cadastro de usuarios @endsection

@section('conteudo')

<div class="container">
    <h1>Cadastro de usuarios</h1>
    
    <!-- Adicione o botão para a rota de registro -->
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Criar Admin</a>

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