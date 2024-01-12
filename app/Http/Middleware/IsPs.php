<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsPs
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is a pemimbing siswa (ps)
        if (auth()->check() && auth()->user()->role === 'ps') {
            return $next($request);
        }

        // Redirect or handle unauthorized access
        return redirect()->route('error.permission')->with('error', 'Unauthorized access.');
    }
}
