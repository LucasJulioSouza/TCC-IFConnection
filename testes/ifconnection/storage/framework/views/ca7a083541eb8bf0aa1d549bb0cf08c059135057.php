

<?php $__env->startSection('titulo'); ?> Cronograma TCC <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <a href="<?php echo e(route('cronograma.cadastrar', ['id' => $id])); ?>" class="btn btn-primary mb-3">Adicionar Tarefa</a>

    <div class="bg-white rounded p-4">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tarefa</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cronogramas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarefa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($tarefa->tarefa); ?></td>
                        <td><?php echo e($tarefa->data); ?></td>
                        <td>
                            <a href="<?php echo e(route('cronograma.editar', ['id' => $tarefa->id])); ?>" class="btn btn-primary">Editar</a>
                            <form action="<?php echo e(route('cronograma.excluir', ['id' => $id, 'cronogramaId' => $tarefa->id])); ?>" method="post" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Cronograma'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cronograma.blade.php ENDPATH**/ ?>