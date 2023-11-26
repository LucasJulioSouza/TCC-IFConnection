

<?php $__env->startSection('titulo', 'Lattes'); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('professores.update', ['id' => $user->id])); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <?php if($editType === 'lattes'): ?>
                <div class="mb-3">
                    <label for="lattes" class="form-label">Lattes:</label>
                    <input type="text" class="form-control" id="lattes" name="lattes" value="<?php echo e($user->lattes); ?>">
                </div>
            <?php else: ?>
            <div class="mb-3">
                <label for="image" class="form-label" style="color: white;">Foto de perfil</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="image" aria-describedby="inputGroupFileAddon">
                    <label class="input-group-text" for="image" id="inputGroupFileAddon">Escolher arquivo</label>
                </div>
            </div>
            <?php endif; ?>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?php echo e(route('professores.index')); ?>" class="btn btn-secondary">Voltar</a>
                <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => ($editType === 'lattes') ? 'Editar Lattes' : 'Editar Foto de Perfil'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/professores/edit.blade.php ENDPATH**/ ?>