<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect()->route('error.permission')->with('error', 'Unauthorized access.');
    }
}
