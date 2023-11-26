

<?php $__env->startSection('titulo'); ?> Cadastro de usuários <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>

<div class="container">
    <h1>Cadastro de usuários</h1>
    
    <!-- Adicione o botão para a rota de registro -->
    <a href="<?php echo e(route('admin.create')); ?>" class="btn btn-primary">Criar Usuário</a>
    

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Status</th> 
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->ativo ? 'Ativo' : 'Inativo'); ?></td> <!-- Exibe o status -->
                    <td>
                        <?php if($user->ativo): ?>
                            <form action="<?php echo e(route('admin.desativarUsuario', $user->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-danger">Desativar</button>
                            </form>
                        <?php else: ?>
                            <form action="<?php echo e(route('admin.ativarUsuario', $user->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <button type="submit" class="btn btn-success">Ativar</button>
                            </form>
                        <?php endif; ?>

                        
                    </td>
                    
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.adminPrincipal', ['titulo' => "Principal"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/admin/index.blade.php ENDPATH**/ ?>