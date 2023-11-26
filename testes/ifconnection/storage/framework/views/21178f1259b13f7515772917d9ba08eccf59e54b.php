

<?php $__env->startSection('titulo'); ?> Cadastro de Documentos <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('documento.salvar')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="orientacao_id" value="<?php echo e($id); ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <textarea id="descricao" name="descricao" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label for="documento" class="form-label">Documento:</label>
                <input type="file" id="documento" name="documento" class="form-control">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Documento</button>
            </div>
        </form>

        <a href="<?php echo e(route('gestao.index')); ?>" class="btn btn-secondary mt-3">Voltar</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Cadastro de Documentos'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cadastrarDocumento.blade.php ENDPATH**/ ?>