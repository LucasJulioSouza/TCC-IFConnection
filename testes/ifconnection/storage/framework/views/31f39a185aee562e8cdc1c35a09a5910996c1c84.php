

<?php $__env->startSection('titulo'); ?> Reuniões TCC  <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

<a href="<?php echo e(route('reuniao.cadastrar', ['id' => $id])); ?>" class="btn btn-primary">Adicionar Reunião</a>

<div class="row mt-4">
    <?php $__currentLoopData = $reunioes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reuniao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo e($reuniao->tema); ?></h5>
                    <div class="mb-2">
                        <strong>Data:</strong> <?php echo e($reuniao->data); ?>

                    </div>
                    <div class="mb-2">
                        <strong>ATA:</strong> <?php echo e($reuniao->ata); ?>

                    </div>
                    
                    <a href="<?php echo e(route('reuniao.cadastrarAta', ['id' => $reuniao->id])); ?>" class="btn btn-primary">Cadastrar ATA</a>
                    <a href="<?php echo e($reuniao->link); ?>" target="_blank" class="btn btn-secondary">Abrir Reunião</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Reuniões'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/reuniao.blade.php ENDPATH**/ ?>