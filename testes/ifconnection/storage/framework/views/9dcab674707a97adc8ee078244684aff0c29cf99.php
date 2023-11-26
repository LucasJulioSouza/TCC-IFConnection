<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
       
        <title>IFConnection - <?php echo $__env->yieldContent('titulo'); ?></title>
        <style>
        .gray-box {
            background-color: #f0f0f0; 
            border-radius: 10px;
            padding: 10px;
        }

        .profile-image-container {
            position: relative;
            display: inline-block;
        }

        .image-container {
            position: relative;
            display: inline-block;
        }

        .profile-image {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            object-fit: cover;
            border: 1px solid #000;
        }

        .edit-button {
            display: none;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 5px 0;
            cursor: pointer;
            border-radius: 50%;
        }

        .image-container:hover .edit-button {
            display: block;
        }

        </style>
        
       
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                
                
                <img src="<?php echo e(asset('css/ifLogoAdmin.png')); ?>" style="width: 120px; height: 80px;">
                
                
                <span class="gray-box">
                    <div class="collapse navbar-collapse" id="itens">
                        <ul class="navbar-nav ms-auto align-items-center">
                            

                            <div class="profile-image-container">
                                <?php if(!empty(Auth::user()->image)): ?>
                                    <div class="image-container">
                                        <img src="<?php echo e(asset (Auth::user()->image)); ?>" style="width: 60px; height: 58px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" alt="Foto de Perfil" class="profile-image">
                                        <a href="<?php echo e(route('alunos.edit', ['aluno' => Auth::user()])); ?>" class="edit-link">
                                            <div class="edit-button">Editar foto</div>
                                        </a>
                                        
                                    </div>
                                <?php else: ?>
                                    <img src="<?php echo e(asset ('css/semFotoPerfil.png')); ?>" style="width: 45px; height: 45px; border-radius: 50%; object-fit: cover; border: 1px solid #000;" alt="Foto de Perfil" class="profile-image">
                                <?php endif; ?>
                            </div>

                            <span class="text-dark" style="margin-left: 10px"><?php echo e(Auth::user()->name); ?></span>

                            <li class="nav-item dropdown ps-2">
                                <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" class="bi bi-house-fill" viewBox="0 0 16 16">
                                        <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                    </svg>
                                    <span class="ps-1 text-dark">Menu</span>
                                </a>
                                <ul class="dropdown-menu">

                                        <li><a href="<?php echo e(route('admin.index')); ?>" class="dropdown-item">Principal</a></li>
                                        <li><a href="<?php echo e(route('materias.index')); ?>" class="dropdown-item">Materias cadastradas</a></li>
                                        
                            
                                    
                                </ul>
                            </li>
                            <li class="nav-item ps-2 me-3">
                                <form method="POST" action="<?php echo e(route('logout')); ?>" id="form">
                                    <?php echo csrf_field(); ?>  
                                    <a nohref style="cursor:pointer" class="nav-link" onclick="document.getElementById('form').submit()">  
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
                                            <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                        <span class="ps-1 text-dark">Sair</span>
                                    </a>
                                </form>
                            </li>
                            
                        </ul>
                    </div>
                    
                </span>
            </div>
        </nav>
        <div class="container py-4">
            <div class="row">
                <div class="col">
                    <h3 class="display-7 text-white d-none d-md-block"><b><?php echo e($titulo); ?></b></h3>
                </div>
            </div>
            
            <?php echo $__env->yieldContent('conteudo'); ?>
        </div>
        <nav class="navbar fixed-bottom navbar-dark bg-dark">
            <div class="container-fluid">
                <span class="text-white fw-light">&copy; Lucas Julio de Souza </span>
                <img src="https://seeklogo.com/images/I/ifpr-instituto-federal-do-parana-icone-logo-E4B5B3D67E-seeklogo.com.png" alt="ifpr" width="50" height="50">
            </div>
        </nav>
    </body>

    
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
    <script src="<?php echo e(asset('js/jquery-3.6.0.min.js')); ?>"></script>

    

    <?php echo $__env->yieldContent('script'); ?>
</html><?php /**PATH C:\Users\Lucas Julio\Documents\GitHub\TCC-IFConnection\testes\ifconnection\resources\views/templates/adminPrincipal.blade.php ENDPATH**/ ?>