@extends('templates.Aprincipal', ['titulo' => "Cadastro de Lattes"])

@section('titulo') 
   

@section('conteudo')
    <form action="{{ route('professores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       

        <div class="form-group">
            <label for="image">Foto de perfil</label>
            <input type="file" class="form-control-file" id="image" name="image" >
        </div>

        <div class="form-group">
            <label for="titulo">Link::</label>
            <input type="text" class="form-control" id="lattes" name="lattes" placeholder="Digite o link do lattes">
        </div>


        <div class="form-group">
            <a href="{{ route('professores.index') }}" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
        </div>
    </form>
@endsection
