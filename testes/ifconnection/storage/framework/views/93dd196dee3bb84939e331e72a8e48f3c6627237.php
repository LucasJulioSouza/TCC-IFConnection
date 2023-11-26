

<?php $__env->startSection('titulo'); ?> Associação de Matérias <?php $__env->stopSection(); ?>

<?php $__env->startSection('conteudo'); ?>
<div class="container">
    <h1 style="color: white; font-size: 24px;">Associação de Matérias</h1>

    <form method="post" action="<?php echo e(route('materiasProfessor.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="professor_id" value="<?php echo e(Auth::user()->id); ?>">

        <h2 style="color: white; font-size: 18px;">Selecione as matérias a serem associadas:</h2>

        <table class="table table-bordered" style="background-color: white;">
            <tbody>
                <?php $__currentLoopData = $materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!$user->materias->contains($materia->id)): ?>
                        <tr style="background-color: white;">
                            <td>
                                <label style="font-size: 16px;">
                                    <input type="checkbox" name="materias[]" value="<?php echo e($materia->id); ?>">
                                    <?php echo e($materia->nome); ?>

                                </label>
                            </td>
                        </tr>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        
                       
        <button type="submit" class="btn btn-primary">Associar Matérias</button>
        
        
        <a href="<?php echo e(route('professores.index')); ?>" class="btn btn-secondary">Voltar</a>
        
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Associação de Matérias"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/materiasProfessor/create.blade.php ENDPATH**/ ?>