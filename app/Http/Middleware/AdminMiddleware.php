<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! auth()->check()) {
            return redirect()->route('login')
                ->with('error', 'Please log in to access the admin panel.');
        }

        if (! auth()->user()->isAdmin()) {
            abort(403, 'You do not have permission to access the admin area.');
        }

        return $next($request);
    }
}