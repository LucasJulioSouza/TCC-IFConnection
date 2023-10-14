<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Define uma seção "titulo" -->
        <title>IFConnection - @yield('titulo')</title>
        <style>
        .gray-box {
            background-color: #f0f0f0; /* Cor de fundo cinza claro */
            border-radius: 10px; /* Raio das bordas arredondadas */
            padding: 10px; /* Espaçamento interno para afastar o texto das bordas */
        }
        </style>
        
        <!-- Bootstrap 5 / CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-success">
            <div class="container-fluid">
                
                <a href="#" class="navbar-brand ms-sm-3">
                    <img src="css/ifprLogo.png" style="width: 290px; height: 80px;">
                
                </a>
                
               
                
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#itens">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-menu-button-wide" viewBox="0 0 16 16">
                        <path d="M0 1.5A1.5 1.5 0 0 1 1.5 0h13A1.5 1.5 0 0 1 16 1.5v2A1.5 1.5 0 0 1 14.5 5h-13A1.5 1.5 0 0 1 0 3.5v-2zM1.5 1a.5.5 0 0 0-.5.5v2a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-13z"/>
                        <path d="M2 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm10.823.323-.396-.396A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                    </svg>
                </button>
                
                <span class="gray-box">
                <div class="collapse navbar-collapse" id="itens">
                    
                    <ul class="navbar-nav ms-auto">
                        <span class="text-dark">{{ Auth::user()->name }}</span>
                        <li class="nav-item dropdown ps-2">
                            <a class="nav-link dropdown-toggle text-dark" data-bs-toggle="dropdown" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#000" class="bi bi-house-fill" viewBox="0 0 16 16">
                                    <path d="M1.5 0A1.5 1.5 0 0 0 0 1.5v2A1.5 1.5 0 0 0 1.5 5h13A1.5 1.5 0 0 0 16 3.5v-2A1.5 1.5 0 0 0 14.5 0h-13zm1 2h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1 0-1zm9.927.427A.25.25 0 0 1 12.604 2h.792a.25.25 0 0 1 .177.427l-.396.396a.25.25 0 0 1-.354 0l-.396-.396zM0 8a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8zm1 3v2a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2H1zm14-1V8a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2h14zM2 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                </svg>
                                <span class="ps-1 text-dark">Menu</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('alunos.index')}}" class="dropdown-item">Principal</a></li>
                                <li><a href="{{route('projetos.index')}}" class="dropdown-item">Projetos</a></li>
                                <li><a href="{{route('orientacao.index')}}" class="dropdown-item">Orientação</a></li>
                                
                            </ul>
                        </li>
                        <li class="nav-item ps-2 me-3">
                            <form method="POST" action="{{ route('logout') }}" id="form">
                                @csrf  
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
                    <h3 class="display-7 text-secondary d-none d-md-block"><b>{{ $titulo }}</b></h3>
                </div>
            </div>
            <hr>
            @yield('conteudo')
        </div>
        <nav class="navbar fixed-bottom navbar-dark bg-success">
            <div class="container-fluid">
                <span class="text-white fw-light">&copy; Lucas Julio de Souza </span>
                <img src="https://seeklogo.com/images/I/ifpr-instituto-federal-do-parana-icone-logo-E4B5B3D67E-seeklogo.com.png" alt="ifpr" width="50" height="50">
            </div>
        </nav>
    </body>

    
    

    <!-- Bootstrap 5 / JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- JQuery / JS -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    

    @yield('script')
</html>