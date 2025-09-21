<?php
namespace App\Http\Middleware;
use Closure;

class SecurityHeaders {
  public function handle($request, Closure $next) {
    $response = $next($request);
    $response->headers->set('X-Frame-Options','SAMEORIGIN');
    $response->headers->set('X-Content-Type-Options','nosniff');
    $response->headers->set('Referrer-Policy','strict-origin-when-cross-origin');
    // CSP básica (ajusta fuentes/estilos/inline según template)
    $response->headers->set('Content-Security-Policy',"default-src 'self'; img-src 'self' data: https:; script-src 'self'; style-src 'self' 'unsafe-inline' https:; font-src 'self' https: data:;");
    return $response;
  }
}
// Kernel.php -> $middleware[] = \App\Http\Middleware\SecurityHeaders::class;
