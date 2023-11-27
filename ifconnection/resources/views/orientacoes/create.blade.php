@extends('templates.Aprincipal', ['titulo' => "Solicitação de orientação"])

@section('titulo') Solicitação de orientação @endsection

@section('conteudo')
<div class="p-4" style="background-color: white; padding: 20px;"> 
    <form action="{{ route('orientacoes.store') }}" method="POST">
        @csrf

       
        <input type="hidden" name="professor_id" value="{{ $professorId }}">

        <div class="mb-3">
            <label for="professor" class="form-label">Professor:</label>
            <input type="text" id="professor" value="{{ $nomeDoProfessor }}" class="form-control" disabled>
        </div>

        
        <div class="mb-3">
            <label for="projeto" class="form-label">Selecione o projeto:</label>
            <select name="projeto" id="projeto" class="form-select">
                @foreach ($projetos as $projeto)
                    <option value="{{ $projeto->id }}">{{ $projeto->titulo }}</option>
                @endforeach
            </select>
        </div>

        
        <button type="submit" class="btn btn-primary">Enviar solicitação de orientação</button>
    </form>
</div>
@endsection
