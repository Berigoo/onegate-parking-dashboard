<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IpFilterMiddleware
{
    protected array $allowedIps = [
        '192.168.99.5',
        '127.0.0.1',
    ];
    
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!in_array($request->ip(), $this->allowedIps)) {
            return response()->json([
                'message' => 'Forbidden'
            ], 403);
        }
        
        return $next($request);
    }
}
