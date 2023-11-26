

<?php $__env->startSection('titulo'); ?> Editar Tarefa <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="bg-white rounded p-4">
        <form action="<?php echo e(route('cronograma.atualizar', ['id' => $cronograma->id, ])); ?>" method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="form-group">
                <label for="tarefa">Tarefa:</label>
                <input type="text" class="form-control" id="tarefa" name="tarefa" value="<?php echo e($cronograma->tarefa); ?>" required>
            </div>

            <div class="form-group">
                <label for="data">Data:</label>
                <input type="date" class="form-control" id="data" name="data" value="<?php echo e($cronograma->data); ?>" required>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Atualizar Tarefa</button>
                <a href="<?php echo e(route('gestao.cronograma', ['id' => $cronograma->orientacao_id])); ?>" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Editar Tarefa do Cronograma'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cronogramaEditar.blade.php ENDPATH**/ ?>