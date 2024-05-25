<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SecurityHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Add HSTS Header
        $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');

        // Add CSP Header
        $response->headers->set('Content-Security-Policy', "upgrade-insecure-requests; block-all-mixed-content");

        return $response;
    }
}
