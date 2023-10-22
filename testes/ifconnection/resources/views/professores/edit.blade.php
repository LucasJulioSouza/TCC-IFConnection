@extends('templates.Aprincipal', ['titulo' => "Editar Lattes"])

@section('titulo', 'Lattes')
   
@section('conteudo')
<form action="{{ route('professores.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    @if ($editType === 'lattes')

    <div class="form-group">
        <label for="lattes">Lattes:</label>
        <input type="text" class="form-control" id="lattes" name="lattes" value="{{ $user->lattes }}">
    </div>

    @else

    <div class="form-group">
        <label for="image" style="color: white;">Foto de perfil</label>
        <input type="file" class="form-control-file" style="color: white;" id="image" name="image">
    </div>

    @endif

    

        <div class="d-flex justify-content-between mt-4">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
@endsection
