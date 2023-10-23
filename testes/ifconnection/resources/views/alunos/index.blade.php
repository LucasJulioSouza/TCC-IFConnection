@extends('templates.Aprincipal', ['titulo' => "Professores TADS"])

@section('titulo') Professores TADS @endsection

@section('conteudo')

<div class="row">
    @foreach($users as $user)
        @if($user->type_id == 1)
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Perfil
                </div>
                <div class="card-header">
                    @if (!empty($user->image))
                        <img src="{{ $user->image }}" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" >
                    @else
                        <img src="css/semFotoPerfil.png" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" >
                    @endif
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>

                    @if (!empty($user->lattes))
                        <p><strong>Lattes:</strong> <a href="{{ $user->lattes }}" target="_blank">{{ $user->lattes }}</a></p>
                    @else
                        <p> * Lattes ainda não disponível!</p>
                    @endif

                    @if ($user->materias->isNotEmpty() && !empty($user->materias))
                    <p><strong>Matérias:</strong> 
                        @foreach($user->materias as $materia)
                            {{ $materia->nome }}
                            @if (!$loop->last)
                                , <!-- Adiciona vírgula se não for o último elemento -->
                            @endif
                        @endforeach
                        </p>
                    @else
                        <p> * materias ainda não disponíveis!</p>
                    @endif
                    
                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection
