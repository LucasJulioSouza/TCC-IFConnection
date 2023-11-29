@extends('templates.Aprincipal', ['titulo' => "Foto de perfil"])

@section('titulo') Foto perfil @endsection

@section('conteudo')

<div class="card p-4">
<form action="{{ route('alunos.update', ['aluno' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="image" style="color: white;">Foto de perfil</label>

        <input type="file" id="image" name="image" class="form-control">
    </div>

    <div class="d-flex justify-content-between mt-4"></div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

        @if(Auth::user()->type_id === 1)
            <a href="{{ route('professores.index') }}" class="btn btn-secondary d-inline-block">Voltar</a>
        @elseif(Auth::user()->type_id === 2)
            <a href="{{ route('alunos.index') }}" class="btn btn-secondary d-inline-block">Voltar</a>
        @endif
    </div>
</form>
</div>

@endsection
