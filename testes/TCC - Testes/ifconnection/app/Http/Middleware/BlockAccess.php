<?php

namespace App\Http\Middleware;

use Closure;

class BlockAccess
{
    public function handle($request, Closure $next)
    {
        return response()->view('templates.proibido');
    }
}