

<?php $__env->startSection('titulo'); ?> Materias <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

 <h1>Cadastro de Matérias</h1>

<a href="<?php echo e(route('materias.create')); ?>" class="btn btn-primary">Adicionar matérias</a>

<table class="table">

    
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>

        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($materia->id); ?></td>
                <td><?php echo e($materia->nome); ?></td>
                
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.adminPrincipal', ['titulo' => "Materias"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/materias/index.blade.php ENDPATH**/ ?>