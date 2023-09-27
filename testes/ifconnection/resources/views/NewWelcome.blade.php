<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Define uma seção "titulo" -->
        <title>IFConnection</title>
        
        <!-- Bootstrap 5 / CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        
        <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-success">
            <div class="ml-auto">
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                        @else
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary">Entrar</button>
                            </form>
                            @if (Route::has('register'))
                                <form method="GET" action="{{ route('register') }}">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </form>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        
        
        <nav class="navbar fixed-bottom navbar-dark bg-success">
            <div class="container-fluid">
                <img src="https://seeklogo.com/images/I/ifpr-instituto-federal-do-parana-icone-logo-E4B5B3D67E-seeklogo.com.png" alt="ifpr" width="50" height="50">
            </div>
        </nav>
    </body>
  
    
</html>