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
                                , 
                            @endif
                        @endforeach
                        </p>
                    @else
                        <p> * materias ainda não disponíveis!</p>
                    @endif

                    @php
                        $orientacoesProfessorAceitas = $orientacao->where('professor_id', $user->id)->where('status', 'aceita')->count();
                        
                        $orientacoesAlunoAceitas = $orientacao->where('professor_id', $user->id)->where('aluno_id', $aluno->id)->where('status', 'aceita')->count();
                        
                        $orientacoesAlunoAceitas = $orientacao->where('aluno_id', $aluno->id)->where('status', 'aceita')->count();

                        $orientacoesPendentes = $orientacao->where('aluno_id', $aluno->id)->where('status', 'pendente')->count();
                        
                        $orientacoesPendentesComProfessor = $orientacao->where('aluno_id', $aluno->id)->where('professor_id', $user->id)->where('status', 'pendente')->count();
                        
                        
                        
                        $limiteOrientacoes = min($orientacoesProfessorAceitas, 5);
                        
                        $usuarioTemOrientacaoAceita = $orientacoesAlunoAceitas > 0;
                        
                        $usuarioTemOrientacaoPendente = $orientacoesPendentes > 0;
                    @endphp

                    <p><strong>Orientações:</strong> {{ $limiteOrientacoes }}/5</p>

                    @if ($usuarioTemOrientacaoPendente)
                        
                        <p>Sua solicitação está em análise!!!</p>

                    @else
                    
                        @if ($limiteOrientacoes < 5 && !$usuarioTemOrientacaoAceita)
                            
                            @if ($aluno->type_id === 2)
                        
                                <a href="{{ route('orientacoes.create', ['professorId' => $user->id]) }}" class="btn btn-primary">Solicitar Orientação</a>
                            
                            @endif
                        
                        @endif
                    
                    @endif


                </div>
            </div>
        </div>
        @endif
    @endforeach
</div>
@endsection
