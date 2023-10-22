@extends('templates.Aprincipal', ['titulo' => "Foto de perfil"])

@section('titulo') Foto perfil @endsection

@section('conteudo')


<form action="{{ route('alunos.update', ['aluno' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="image" style="color: white;">Foto de perfil</label>
        <input type="file" class="form-control-file" style="color: white;" id="image" name="image">
    </div>

    <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary" >Salvar Alterações</button>
    </div>
</form>


@endsection
