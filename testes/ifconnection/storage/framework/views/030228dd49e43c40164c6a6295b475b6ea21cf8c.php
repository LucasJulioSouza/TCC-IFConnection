

<?php $__env->startSection('titulo'); ?> Documentos TCC  <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<a href="<?php echo e(route('documento.cadastrar', ['id' => $id])); ?>" class="btn btn-primary">Adicionar Documento</a>

<div class="row mt-4">
    <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($documento->nome); ?></h5>
                    <p class="card-text"><?php echo e($documento->descricao); ?></p>
                    <a href="<?php echo e(route('documento.download', ['id' => $documento->id])); ?>" class="btn btn-primary">Download</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Documentos'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/documento.blade.php ENDPATH**/ ?>