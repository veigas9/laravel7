<?php

namespace App\Http\Middleware;

use Closure;
use Facade\FlareClient\Http\Response;

class AtenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //se usuário autenticado, segue o fluxo
        if (true) {
            return $next($request);
        } else {
            return Response('Acesso negado, rota exige autenticação');
        }

        //return $next($request);
    }
}
