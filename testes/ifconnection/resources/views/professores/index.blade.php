@extends('templates.Aprincipal', ['titulo' => "Perfil"])

@section('titulo', 'Perfil')

@section('conteudo')
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <div class="card">
        <div class="card-header">
            Perfil
            
        </div>
        <div class="card-header">
           
            @if (!empty($user->image))
                <img src="{{ $user->image }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
            @else
                <img src="img/profile/semFotoPerfil.png" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
            @endif
            
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            
            @if (!empty($user->lattes))
                <p><strong>Lattes:</strong> {{ $user->lattes }}</p>
            @else
                <p>Cadastre o link do seu Lattes!</p>
            @endif

            @if (!empty($materiasDoProfessor))
            <p><strong>Matérias:</strong> 
            
            @foreach ($materiasDoProfessor as $materia)
                {{ $materia->nome }}
                @if (!$loop->last)
                    ,
                @endif
            @endforeach
            </p>
            @else
                <p>Ainda não tem matérias cadastradas!</p>
            @endif

            
        </div>

        <div class="card-footer">
            @if (!empty($user->lattes))
                <a href="{{ route('professores.edit', ['id' => $user->id, 'edit_type' => 'lattes']) }}" class="btn btn-primary">Editar Lattes</a>
                <a href="{{ route('professores.edit', ['id' => $user->id, 'edit_type' => 'foto']) }}" class="btn btn-primary">Editar Foto</a>
            @else
                <a href="{{ route('professores.create') }}" class="btn btn-primary">Cadastrar Lattes e foto</a>
            @endif
            <td><a href="{{ route('materiasProfessor.create') }}" class="btn btn-primary">Vincular matérias</a></td>
            <td><a href="{{ route('materiasProfessor.edit', ['userId' => $user->id]) }}" class="btn btn-primary">Editar Matérias</a></td>
            <td><a href="{{ route('orientacoes.solicitacoes') }}" class="btn btn-warning">Solicitações de orientação</a></td>
            <td><a href="{{ route('gestao.index') }}" class="btn btn-warning">gestão</a></td>
        </div>
    </div>
</div>
@endsection
