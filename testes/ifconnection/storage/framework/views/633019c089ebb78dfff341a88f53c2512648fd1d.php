

<?php $__env->startSection('titulo'); ?> Cadastro da Ata <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
    <div class="card p-4">
        <form action="<?php echo e(route('reuniao.salvar-ata', ['reuniao' => $id])); ?>" method="post" >
            <?php echo csrf_field(); ?>

            

            <div class="form-group">
                <label for="ata">Ata:</label>
                <textarea id="ata" name="ata" class="form-control" rows="5" required></textarea>
            </div>


            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Salvar Ata</button>
            </div>
        </form>

        <a href="<?php echo e(route('gestao.index')); ?>" class="btn btn-secondary mt-3">Voltar</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => 'Cadastro da Ata'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/gestao/cadastrarAta.blade.php ENDPATH**/ ?>