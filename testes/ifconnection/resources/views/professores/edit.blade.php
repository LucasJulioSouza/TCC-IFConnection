@extends('templates.Aprincipal', ['titulo' => ($editType === 'lattes') ? 'Editar Lattes' : 'Editar Foto de Perfil'])

@section('titulo', 'Lattes')

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('professores.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($editType === 'lattes')
                <div class="mb-3">
                    <label for="lattes" class="form-label">Lattes:</label>
                    <input type="text" class="form-control" id="lattes" name="lattes" value="{{ $user->lattes }}">
                </div>
            @else
            <div class="mb-3">
                <label for="image" class="form-label" style="color: white;">Foto de perfil</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon">
                    <label class="input-group-text" for="image" id="inputGroupFileAddon">Escolher arquivo</label>
                </div>
            </div>
            @endif

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('professores.index') }}" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>
@endsection
