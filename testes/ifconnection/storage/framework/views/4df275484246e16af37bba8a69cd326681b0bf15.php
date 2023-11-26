

<?php $__env->startSection('titulo'); ?> Cadastro de Reuniões <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('reuniao.salvar')); ?>" method="post" >
            <?php echo csrf_field(); ?>

            <input type="hidden" name="orientacao_id" value="<?php echo e($id); ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Tema:</label>
                <input type="text" id="nome" name="tema" class="form-control">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">link:</label>
                <textarea id="descricao" name="link" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Reunião</button>
            </div>
        </form>

        <a href="<?php echo e(route('gestao.index')); ?>" class="btn btn-secondary mt-3">Voltar</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Cadastro de Reuniões'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cadastrarReuniao.blade.php ENDPATH**/ ?>