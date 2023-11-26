

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('projetos.update', $projeto->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo e($projeto->titulo); ?>">
            </div>

            <div class="mb-3">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea class="form-control" id="resumo" name="resumo" rows="3"><?php echo e($projeto->resumo); ?></textarea>
            </div>
            
            <div class="mb-3">
                <label for="foto" class="form-label" style="color: white;">Foto de capa</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="foto" name="foto" aria-describedby="inputGroupFileAddon">
                    
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                <a href="<?php echo e(route('projetos.index')); ?>" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Editar Projeto'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/projetos/edit.blade.php ENDPATH**/ ?>