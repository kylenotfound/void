<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware {

    public function handle(Request $request, Closure $next): Response {
        abort_if(!auth()->check() || (auth()->check() && !auth()->user()->isAdmin()), 403);

        return $next($request);
    }
}
