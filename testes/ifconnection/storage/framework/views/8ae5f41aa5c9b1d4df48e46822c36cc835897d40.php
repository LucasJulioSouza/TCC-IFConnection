

<?php $__env->startSection('titulo', 'Perfil'); ?>

<?php $__env->startSection('conteudo'); ?>
<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<div class="container">
    <div class="card">
        <div class="card-header">
            Perfil
            
        </div>
        <div class="card-header">
           
            <?php if(!empty($user->image)): ?>
                <img src="<?php echo e($user->image); ?>" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
            <?php else: ?>
                <img src="img/profile/semFotoPerfil.png" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover;" >
            <?php endif; ?>
            
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> <?php echo e($user->name); ?></p>
            <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
            
            <?php if(!empty($user->lattes)): ?>
                <p><strong>Lattes:</strong> <?php echo e($user->lattes); ?></p>
            <?php else: ?>
                <p>Cadastre o link do seu Lattes!</p>
            <?php endif; ?>

            <?php if(!empty($materiasDoProfessor)): ?>
            <p><strong>Matérias:</strong> 
            
            <?php $__currentLoopData = $materiasDoProfessor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($materia->nome); ?>

                <?php if(!$loop->last): ?>
                    ,
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <?php else: ?>
                <p>Ainda não tem matérias cadastradas!</p>
            <?php endif; ?>

            
        </div>

        <div class="card-footer">
            <?php if(!empty($user->lattes)): ?>
                <a href="<?php echo e(route('professores.edit', ['id' => $user->id, 'edit_type' => 'lattes'])); ?>" class="btn btn-primary">Editar Lattes</a>
                <a href="<?php echo e(route('professores.edit', ['id' => $user->id, 'edit_type' => 'foto'])); ?>" class="btn btn-primary">Editar Foto</a>
            <?php else: ?>
                <a href="<?php echo e(route('professores.create')); ?>" class="btn btn-primary">Cadastrar Lattes e foto</a>
            <?php endif; ?>
            <td><a href="<?php echo e(route('materiasProfessor.create')); ?>" class="btn btn-primary">Vincular matérias</a></td>
            <td><a href="<?php echo e(route('materiasProfessor.edit', ['userId' => $user->id])); ?>" class="btn btn-primary">Editar Matérias</a></td>
            <td><a href="<?php echo e(route('orientacoes.solicitacoes')); ?>" class="btn btn-warning">Solicitações de orientação</a></td>
            <td><a href="<?php echo e(route('gestao.index')); ?>" class="btn btn-warning">gestão</a></td>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Perfil"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/professores/index.blade.php ENDPATH**/ ?>