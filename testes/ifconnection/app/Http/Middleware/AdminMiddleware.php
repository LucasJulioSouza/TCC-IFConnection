<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Verifique se o usuário está autenticado
        if (auth()->check()) {
            // Verifique se o campo 'type_id' do usuário é igual a 3
            if (auth()->user()->type_id === 3) {
                return $next($request); // Permite o acesso
            }
        }

        // Se não for um administrador, redirecione ou retorne um erro 403
        abort(403, 'Acesso não autorizado.'); // Ou redirecione para outra página de erro, se preferir
    }
}
