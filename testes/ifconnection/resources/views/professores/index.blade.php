@extends('templates.Pprincipal', ['titulo' => "Projetos"])

@section('titulo') 
   
@endsection

@section('conteudo')

    <div class="container">
       <h1>Perfil do Usuário</h1>
       <p>Nome: {{ $user->name }}</p>
      <p>Email: {{ $user->email }}</p>
      <!-- Outros detalhes do usuário -->
    </div>
    
@endsection
