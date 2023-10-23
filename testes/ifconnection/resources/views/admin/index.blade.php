@extends('templates.adminPrincipal', ['titulo' => "Principal"])

@section('titulo') Cadastro de usuários @endsection

@section('conteudo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <h1>Cadastro de usuários</h1>
    
    <!-- Adicione o botão para a rota de registro -->
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Criar Usuário</a>
    

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Status</th> 
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->ativo ? 'Ativo' : 'Inativo' }}</td> <!-- Exibe o status -->
                    <td>
                        @if($user->ativo)
                            <form action="{{ route('admin.desativarUsuario', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger">Desativar</button>
                            </form>
                        @else
                            <form action="{{ route('admin.ativarUsuario', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Ativar</button>
                            </form>
                        @endif

                        
                    </td>
                    
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
