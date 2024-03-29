<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        '/v1/login',
        '/v1/prestamos-actuales',
        '/v1/prestamo-finalizado',
        '/v1/newmovie',
        '/v1/newprestamo',
        '/v1/finalizarprestamo',
        '/v1/new-cliente',
        '/v1/socio/*',
        '/v1/remove-cliente-espera/*'
    ];
}
