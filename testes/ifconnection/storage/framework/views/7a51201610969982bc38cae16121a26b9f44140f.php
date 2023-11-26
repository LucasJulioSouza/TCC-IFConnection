

<?php $__env->startSection('titulo'); ?> Solicitação de orientação <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="p-4" style="background-color: white; padding: 20px;"> 
    <form action="<?php echo e(route('orientacoes.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

       
        <input type="hidden" name="professor_id" value="<?php echo e($professorId); ?>">

        <div class="mb-3">
            <label for="professor" class="form-label">Professor:</label>
            <input type="text" id="professor" value="<?php echo e($nomeDoProfessor); ?>" class="form-control" disabled>
        </div>

        
        <div class="mb-3">
            <label for="projeto" class="form-label">Selecione o projeto:</label>
            <select name="projeto" id="projeto" class="form-select">
                <?php $__currentLoopData = $projetos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($projeto->id); ?>"><?php echo e($projeto->titulo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        
        <button type="submit" class="btn btn-primary">Enviar solicitação de orientação</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Solicitação de orientação"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/orientacoes/create.blade.php ENDPATH**/ ?>