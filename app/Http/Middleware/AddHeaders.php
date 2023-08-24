<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;

class AddHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->header("Access-Control-Allow-Origin", '*');
        $response->header("Access-Control-Allow-Methods", "POST, GET, OPTIONS");
        $response->header("Access-Control-Allow-Headers", "Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token");
        $response->header("Access-Control-Expose-Headers", "AMP-Access-Control-Allow-Source-Origin");
        $response->header("AMP-Access-Control-Allow-Source-Origin",
        'http://localhost:8000');
        $response->header("AMP-Access-Control-Allow-Source-Origin", 'himalayantrekkers.cdn.ampproject.org');
        $response->header("Access-Control-Allow-Credentials", "true");

        return $response;
    }
}
