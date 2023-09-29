@extends('templates.Pprincipal', ['titulo' => "Perfil"])

@section('titulo') 
   
@endsection

@section('conteudo')

    <div class="container">
       <h1>Perfil do Usuário</h1>
       <p>Nome: {{ $professor->name }}</p>
      <p>Email: {{ $professor->email }}</p>
      
    </div>
    
@endsection
