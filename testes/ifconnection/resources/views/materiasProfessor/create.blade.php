@extends('templates.Aprincipal', ['titulo' => "Associação de Matérias"])

@section('titulo') Associação de Matérias @endsection

@section('conteudo')
<div class="container">
    <h1 style="color: white; font-size: 24px;">Associação de Matérias</h1>

    <form method="post" action="{{ route('materiasProfessor.store') }}">
        @csrf
        <input type="hidden" name="professor_id" value="{{ Auth::user()->id }}">

        <h2 style="color: white; font-size: 18px;">Selecione as matérias a serem associadas:</h2>

        <table class="table table-bordered" style="background-color: white;">
            <tbody>
                @foreach($materias as $materia)
                    @if (!$user->materias->contains($materia->id))
                        <tr style="background-color: white;">
                            <td>
                                <label style="font-size: 16px;">
                                    <input type="checkbox" name="materias[]" value="{{ $materia->id }}">
                                    {{ $materia->nome }}
                                </label>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Associar Matérias</button>
    </form>
</div>
@endsection
