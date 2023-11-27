@extends('templates.Aprincipal', ['titulo' => 'Cadastro da Ata'])

@section('titulo') Cadastro da Ata @endsection

@section('conteudo')
    <div class="card p-4">
        <form action="{{ route('reuniao.salvar-ata', ['reuniao' => $id]) }}" method="post" >
            @csrf

            

            <div class="form-group">
                <label for="ata">Ata:</label>
                <textarea id="ata" name="ata" class="form-control" rows="5" required></textarea>
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Ata</button>
            </div>
        </form>

        <a href="{{ route('gestao.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
