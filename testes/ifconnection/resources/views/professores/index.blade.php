@extends('templates.Pprincipal', ['titulo' => "Perfil"])

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
            <img src="{{ asset($user->photo) }}" alt="Foto de Perfil">
        </div>
        <div class="card-body">
            
            <p><strong>Nome:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            
            @if (!empty($user->lattes))
                <p><strong>Lattes:</strong> {{ $user->lattes }}</p>
            @else
                <p>Cadastre o link do seu Lattes!</p>
            @endif
        </div>

        
        <div class="card-footer">
            @if (!empty($user->lattes))
                <a href="{{ route('professores.edit',$user->id) }}" class="btn btn-primary">Editar Lattes</a>
            @else
                <a href="{{ route('professores.create') }}" class="btn btn-primary">Cadastrar Lattes</a>
            @endif
        </div>
        
    </div>
    <img src="{{ asset($user->photo) }}" alt="Foto de Perfil">
</div>
@endsection
