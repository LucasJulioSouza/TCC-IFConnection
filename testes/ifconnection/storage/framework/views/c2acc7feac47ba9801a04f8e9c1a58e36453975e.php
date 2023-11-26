

<?php $__env->startSection('titulo'); ?> Orientação <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div style="background-color: white; padding: 20px;">

        <div class="row">
            <?php $__currentLoopData = $solicitacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solicitacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3">
                    <div class="card" style="margin-bottom: 20px;">
                        <div class="card-body">
                            
                            <img src="<?php echo e(asset($solicitacao->projeto->foto)); ?>" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
                            <h5 class="card-title">Projeto: <?php echo e($solicitacao->projeto->titulo); ?></h5>
                            <p class="card-text">Solicitante: <?php echo e($solicitacao->aluno->name); ?></p>
                            
                            <div class="d-flex justify-content-between">
                                <form method="POST" action="<?php echo e(route('orientacoes.aceitar', ['orientacao' => $solicitacao->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-success">Aceitar</button>
                                </form>

                                <form method="POST" action="<?php echo e(route('orientacoes.recusar', ['orientacao' => $solicitacao->id])); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PUT'); ?>
                                    <button type="submit" class="btn btn-danger">Recusar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Solicitações de Orientação"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/orientacoes/solicitacoes.blade.php ENDPATH**/ ?>