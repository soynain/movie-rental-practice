<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VerificarListaEsperaMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $queryUniqueWaiting = DB::table('listaespera')
            ->where('socio_fk', $request->socioid)
            ->where(function ($q) use ($request) {
                $q->where('pelicula_fk', $request->peliculaid);
            })
            ->first();
        //  Log::info(json_encode($queryUniqueWaiting).'AYAYAY');
        if ($queryUniqueWaiting != null)
            return response()
                ->json([
                    'Status' => 'Waiting existent',
                    'Message' => 'The user is already waiting'
                ], 400);
        return $next($request);
    }
}
