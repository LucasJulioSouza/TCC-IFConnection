<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   
    <title>IFConnection</title>
    
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        body {
            background-image: url('css/fotoWallpaper.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Instituto_Federal_Marca_2015.svg/640px-Instituto_Federal_Marca_2015.svg.png" width="30" height="30" class="d-inline-block align-top" alt="">Connection
            </a>
        </div>
    </nav>

    
    <div class="container py-4">
        <div class="row">
            <div class="col">
                <h3 class="display-7 text-secondary d-none d-md-block"><b>{{ $titulo }}</b></h3>
            </div>
            @if(isset($rota))
                <div class="col d-flex justify-content-end">
                    <a href= "{{ route($rota) }}" class="btn btn-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#FFF" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
        <hr>
        @yield('conteudo')
    </div>
    
    <nav class="navbar fixed-bottom navbar-dark bg-success">
        <div class="container-fluid">
            <span class="text-white fw-light">&copy; Lucas Julio de Souza </span>
        </div>
    </nav>
</body>
</html>
