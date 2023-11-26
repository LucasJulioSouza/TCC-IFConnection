

<?php $__env->startSection('titulo'); ?> Adicionar Tarefa <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="bg-white rounded p-4">
        <form action="<?php echo e(route('cronograma.salvar', ['id' => $id])); ?>" method="post">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="tarefa">Tarefa:</label>
                <input type="text" class="form-control" id="tarefa" name="tarefa" required>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="btn btn-primary">Adicionar Tarefa</button>
                <a href="<?php echo e(route('gestao.cronograma', ['id' => $id])); ?>" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Adicionar Tarefa ao Cronograma'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cronogramaCadastrar.blade.php ENDPATH**/ ?>