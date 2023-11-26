

<?php $__env->startSection('titulo'); ?> 
   
<?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>

    <?php if(Auth::user()->type_id === 1): ?>
        <div class="row">
            <?php $__currentLoopData = $projetos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4">
                    <div class="card bg-light" style="width: 18rem;">
                        <div class="card-body d-flex align-items-center">
                            <?php if(!empty($projeto->user->image)): ?>
                                <img src="<?php echo e($projeto->user->image); ?>" alt="Foto do Aluno" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #000;">
                            <?php else: ?>
                                <img src="img/profile/semFotoPerfil.png" alt="Foto do Aluno" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #000;">
                            <?php endif; ?>
                            <p class="ml-3" style="margin-top: 15px; margin-left: 10px"><?php echo e($projeto->user->name); ?></p>
                        </div>
                        <div class="card-body d-flex align-items-center" style="min-height: 100px;"> 
                            <h3 class="card-title"><?php echo e($projeto->titulo); ?></h3>
                        </div>
                        <img src="<?php echo e($projeto->foto); ?>" class="card-img-top" alt="..." style="object-fit: cover; height: 200px;">
                        <div class="card-body" style="min-height: 100px;">
                            <h5 class="card-title">Descrição:</h5>
                            <p class="card-text"><?php echo e($projeto->resumo); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <?php if($projetos->isEmpty()): ?>
            <p>Não existem projetos cadastrados.</p>
        <?php else: ?>
            <div class="row">
                <?php $__currentLoopData = $projetos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $projeto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($projeto->user_id == auth()->user()->id): ?>
                        <div class="col-md-4">
                            <div class="card" style="width: 18rem;">
                                <?php if($projeto->foto): ?>
                                    <img src="<?php echo e(asset($projeto->foto)); ?>" alt="Foto do Projeto" style="object-fit: cover; height: 200px;">
                                <?php endif; ?>
                                <div class="card-body" style="min-height: 100px;">
                                    <h5 class="card-title"><?php echo e($projeto->titulo); ?></h5>
                                    <p class="card-text"><?php echo e($projeto->resumo); ?></p>
                                    <div class="d-flex justify-content-between">
                                        <a href="<?php echo e(route('projetos.edit', $projeto->id)); ?>" class="btn btn-primary">Editar</a>
                                        <?php if(!$projeto->orientacoes || !$projeto->orientacoes->contains('status', '!=', 'cancelada')): ?>
                                            <form action="<?php echo e(route('projetos.destroy', $projeto->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="<?php echo e(route('projetos.create')); ?>" class="btn btn-success">Adicionar projeto</a>
        </div>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Projetos"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/projetos/index.blade.php ENDPATH**/ ?>