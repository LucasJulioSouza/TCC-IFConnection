<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <!-- Adicione o link para o Bootstrap CSS aqui -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Registercss/registerStyle.css">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand ms-sm-3">
                  <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-clipboard2-pulse-fill" viewBox="0 0 16 16">
                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                  </svg>
                    <span class="ms-3 fs-5">IFConnection</span>
            </a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-success"><?php echo e(__('Registro')); ?></div>
                    <div class="card-body">
                        <!-- Validation Errors -->
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'mb-4','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        
                        <form method="POST" action="<?php echo e(route('register')); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name"><?php echo e(__('Nome')); ?></label>
                                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus>
                            </div>
                            
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="email"><?php echo e(__('Email')); ?></label>
                                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required>
                            </div>
                            
                            <!-- Password -->
                            <div class="form-group">
                                <label for="password"><?php echo e(__('Senha')); ?></label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                            </div>
                            
                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label for="password_confirmation"><?php echo e(__('Confirmar Senha')); ?></label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required>
                            </div>
                            
                            <!-- User Type -->
                            <div class="form-group">
                                <label for="type_id"><?php echo e(__('Permissão')); ?></label>
                                <select id="type_id" class="form-control" name="type_id">
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>">
                                            <?php echo e($item->nome); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Registrar')); ?></button>
                                    <a href="<?php echo e(route('admin.index')); ?>" class="btn btn-secondary">Voltar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar fixed-bottom navbar-dark bg-dark">
        <div class="container-fluid">
            <img src="https://seeklogo.com/images/I/ifpr-instituto-federal-do-parana-icone-logo-E4B5B3D67E-seeklogo.com.png" alt="ifpr" width="50" height="50">
        </div>
    </nav>
    
    <!-- Adicione o link para o Bootstrap JS e jQuery aqui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/auth/register.blade.php ENDPATH**/ ?>