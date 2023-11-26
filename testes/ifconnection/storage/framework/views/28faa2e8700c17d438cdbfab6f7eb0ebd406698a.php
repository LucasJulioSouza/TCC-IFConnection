

<?php $__env->startSection('titulo'); ?> Foto perfil <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>


<form action="<?php echo e(route('alunos.update', ['aluno' => $user->id])); ?>" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>

    <div class="form-group">
        <label for="image" style="color: white;">Foto de perfil</label>
        <input type="file" class="form-control-file" style="color: white;" id="image" name="image">
    </div>

    <div class="d-flex justify-content-between mt-4"></div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    
        <?php if(Auth::user()->type_id === 1): ?>
            <a href="<?php echo e(route('professores.index')); ?>" class="btn btn-secondary d-inline-block">Voltar</a>
        <?php elseif(Auth::user()->type_id === 2): ?>
            <a href="<?php echo e(route('alunos.index')); ?>" class="btn btn-secondary d-inline-block">Voltar</a>
        <?php endif; ?>
    </div>
</form>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Foto de perfil"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/alunos/edit.blade.php ENDPATH**/ ?>