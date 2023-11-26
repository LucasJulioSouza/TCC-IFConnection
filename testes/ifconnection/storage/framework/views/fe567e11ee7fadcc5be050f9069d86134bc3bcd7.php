

<?php $__env->startSection('titulo'); ?> 
   

<?php $__env->startSection('conteudo'); ?>
    <form action="<?php echo e(route('professores.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
       

        <div class="form-group">
            <label for="image">Foto de perfil</label>
            <input type="file" class="form-control-file" id="image" name="image" >
        </div>

        <div class="form-group">
            <label for="titulo">Link::</label>
            <input type="text" class="form-control" id="lattes" name="lattes" placeholder="Digite o link do lattes">
        </div>


        <div class="form-group">
            <a href="<?php echo e(route('professores.index')); ?>" class="btn btn-secondary">Voltar</a>
            <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Cadastrar</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Cadastro de Lattes"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/professores/create.blade.php ENDPATH**/ ?>