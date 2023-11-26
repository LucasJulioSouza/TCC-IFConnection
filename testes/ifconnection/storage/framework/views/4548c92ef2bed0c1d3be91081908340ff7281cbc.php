

<?php $__env->startSection('titulo', 'Edição de Matérias'); ?>
<?php $__env->startSection('conteudo'); ?>

<style>
    /* Estilo para as células da tabela */
    table th, table td {
        color: black; /* Texto preto */
    }
</style>

<div class="container">
    <h1 style="color: white;">Editar Matérias do Professor</h1>
    <p style="color: white;">Nome do Professor: <?php echo e($user->name); ?></p>

    <form method="post" action="<?php echo e(route('materiasProfessor.update', ['userId' => $user->id])); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('put'); ?>

        <table class="table" style="background-color: white;"> <!-- Fundo da tabela branco -->
            <thead>
                <tr>
                    <th>Matéria</th>
                    <th>Associada</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $user->materias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($materia->nome); ?></td>
                        <td>
                            <input type="checkbox" name="materias[]" value="<?php echo e($materia->id); ?>" checked>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="<?php echo e(route('professores.index')); ?>" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('templates.Aprincipal', ['titulo' => "Edição de Matérias"], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/materiasProfessor/edit.blade.php ENDPATH**/ ?>