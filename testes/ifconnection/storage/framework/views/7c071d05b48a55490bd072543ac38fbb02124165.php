

<?php $__env->startSection('titulo'); ?> 
   

<?php $__env->startSection('conteudo'); ?>
    <form action="<?php echo e(route('materias.store')); ?>" method="POST" >
        <?php echo csrf_field(); ?>
       
        <div class="form-group">
            <label for="titulo">Nome da materia</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome da materia">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
            <a href="<?php echo e(route('materias.index')); ?>" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.adminPrincipal', ['titulo' => "Cadastro de Materias"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/materias/create.blade.php ENDPATH**/ ?>