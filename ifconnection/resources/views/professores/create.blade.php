@extends('templates.Aprincipal', ['titulo' => "Cadastro de Lattes"])

@section('titulo')


@section('conteudo')
    <div class="card p-4">
    <form action="{{ route('professores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf




        <div class="mb-3">
                <label for="documento" class="form-label">Foto de perfil</label>
                <input type="file" id="image" name="image" class="form-control">
        </div>

        <div class="form-group">
            <input type="text" class="form-control" id="lattes" name="lattes" placeholder="Digite o link do lattes">
        </div>


        <div class="form-group">
            <a href="{{ route('professores.index') }}" class="btn btn-secondary" style="margin-top: 10px;">Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
        </div>
    </form>
    </div>
@endsection
