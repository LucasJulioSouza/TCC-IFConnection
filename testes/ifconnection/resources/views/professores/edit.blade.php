@extends('templates.Pprincipal', ['titulo' => "Editar Lattes"])

@section('titulo', 'Lattes')
   
@section('conteudo')
    <form action="{{ route('professores.update', $lattes) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="lattes">Lattes:</label>
            <input type="text" class="form-control" id="lattes" name="lattes" value="{{ $lattes }}">
        </div>

        <!-- Adicione um botão de envio para salvar as alterações -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
@endsection
