
<?php $__env->startSection('titulo'); ?> Gestão TCC <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="row">
        <?php $__currentLoopData = $orientacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orientacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?php echo e(asset($orientacao->projeto->foto)); ?>" class="card-img-top" alt="<?php echo e($orientacao->projeto->titulo); ?>">
                    <div class="card-body">
                        <h5 class="card-title">Orientador: <?php echo e($orientacao->professor->name); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Aluno: <?php echo e($orientacao->aluno->name); ?></h6>
                        <p class="card-text"><strong>Projeto:</strong> <?php echo e($orientacao->projeto->titulo); ?></p>
                        <p class="card-text"><strong>Descrição:</strong> <?php echo e($orientacao->projeto->resumo); ?></p>
                    </div>
                    <div class="card-footer">
                        <a href="<?php echo e(route('gestao.documento', ['id' => $orientacao->id])); ?>" class="btn btn-primary btn-block">Documentos</a>
                        <a href="<?php echo e(route('gestao.reuniao', ['id' => $orientacao->id])); ?>" class="btn btn-secondary btn-block">Reuniões</a>
                        <a href="<?php echo e(route('gestao.cronograma', ['id' => $orientacao->id])); ?>" class="btn btn-info btn-block">Cronograma</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => ($typeUserId === 1) ? 'Trabalhos Orientados' : 'Gestão TCC'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/index.blade.php ENDPATH**/ ?>