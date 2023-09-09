<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class CustomAuthenticate extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    public function handle($request, Closure $next, ...$guards)
    {
        $this->authenticate($request, $guards);

        // Verifique se o usuário está autenticado e tem type_id igual a 3
        if (auth()->check() && auth()->user()->type_id === 3) {
            return $next($request);
        }

        abort(403, 'Acesso não autorizado.'); // Ou redirecione para outra página de erro, se preferir
    }
}
