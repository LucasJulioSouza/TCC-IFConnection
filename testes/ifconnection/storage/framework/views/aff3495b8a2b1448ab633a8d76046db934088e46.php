

<?php $__env->startSection('titulo'); ?> 
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('projetos.store')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Digite o título do projeto">
            </div>

            <div class="mb-3">
                <label for="resumo" class="form-label">Resumo:</label>
                <textarea class="form-control" id="resumo" name="resumo" rows="3" placeholder="Digite o resumo do projeto"></textarea>
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label" style="color: rgb(0, 0, 0);">Foto de capa</label>
                <input type="file" class="form-control" style="color: rgb(0, 0, 0);" id="foto" name="foto">
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

            <div class="d-grid gap-2 mt-3">
                <a href="<?php echo e(route('projetos.store')); ?>" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Cadastro de Projetos'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/projetos/create.blade.php ENDPATH**/ ?>