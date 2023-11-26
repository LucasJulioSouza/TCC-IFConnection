

<?php $__env->startSection('titulo'); ?> Professores TADS <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<div class="row">
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($user->type_id == 1): ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Perfil
                </div>
                <div class="card-header">
                    <?php if(!empty($user->image)): ?>
                        <img src="<?php echo e($user->image); ?>" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" >
                    <?php else: ?>
                        <img src="css/semFotoPerfil.png" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" >
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <p><strong>Nome:</strong> <?php echo e($user->name); ?></p>
                    <p><strong>Email:</strong> <?php echo e($user->email); ?></p>

                    <?php if(!empty($user->lattes)): ?>
                        <p><strong>Lattes:</strong> <a href="<?php echo e($user->lattes); ?>" target="_blank"><?php echo e($user->lattes); ?></a></p>
                    <?php else: ?>
                        <p> * Lattes ainda não disponível!</p>
                    <?php endif; ?>

                    <?php if($user->materias->isNotEmpty() && !empty($user->materias)): ?>
                    <p><strong>Matérias:</strong> 
                        <?php $__currentLoopData = $user->materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($materia->nome); ?>

                            <?php if(!$loop->last): ?>
                                , 
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    <?php else: ?>
                        <p> * materias ainda não disponíveis!</p>
                    <?php endif; ?>

                    <?php
                        $orientacoesProfessorAceitas = $orientacao->where('professor_id', $user->id)->where('status', 'aceita')->count();
                        
                        $orientacoesAlunoAceitas = $orientacao->where('professor_id', $user->id)->where('aluno_id', $aluno->id)->where('status', 'aceita')->count();
                        
                        $orientacoesAlunoAceitas = $orientacao->where('aluno_id', $aluno->id)->where('status', 'aceita')->count();

                        $orientacoesPendentes = $orientacao->where('aluno_id', $aluno->id)->where('status', 'pendente')->count();
                        
                        $orientacoesPendentesComProfessor = $orientacao->where('aluno_id', $aluno->id)->where('professor_id', $user->id)->where('status', 'pendente')->count();
                        
                        
                        
                        $limiteOrientacoes = min($orientacoesProfessorAceitas, 5);
                        
                        $usuarioTemOrientacaoAceita = $orientacoesAlunoAceitas > 0;
                        
                        $usuarioTemOrientacaoPendente = $orientacoesPendentes > 0;
                    ?>

                    <p><strong>Orientações:</strong> <?php echo e($limiteOrientacoes); ?>/5</p>

                    <?php if($usuarioTemOrientacaoPendente): ?>
                        
                        <p>Sua solicitação está em análise!!!</p>

                    <?php else: ?>
                    
                        <?php if($limiteOrientacoes < 5 && !$usuarioTemOrientacaoAceita): ?>
                            
                            <?php if($aluno->type_id === 2): ?>
                        
                                <a href="<?php echo e(route('orientacoes.create', ['professorId' => $user->id])); ?>" class="btn btn-primary">Solicitar Orientação</a>
                            
                            <?php endif; ?>
                        
                        <?php endif; ?>
                    
                    <?php endif; ?>


                </div>
            </div>
        </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Professores TADS"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/alunos/index.blade.php ENDPATH**/ ?>