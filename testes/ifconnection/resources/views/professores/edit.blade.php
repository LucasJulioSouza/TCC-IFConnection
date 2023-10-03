@extends('templates.Pprincipal', ['titulo' => "Editar Lattes"])

@section('titulo', 'Lattes')
   
@section('conteudo')
<form action="{{ route('professores.update', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="lattes">Lattes:</label>
        <input type="text" class="form-control" id="lattes" name="lattes" value="{{ $user->lattes }}">
    </div>

        <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
@endsection
