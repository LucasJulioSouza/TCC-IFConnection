@extends('templates.Pprincipal', ['titulo' => "Cadastro de Lattes"])

@section('titulo') 
   

@section('conteudo')
    <form action="{{ route('professores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="titulo">Link::</label>
            <input type="text" class="form-control" id="lattes" name="lattes" placeholder="Digite o link do lattes">
        </div>


        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
        </div>
    </form>
@endsection
