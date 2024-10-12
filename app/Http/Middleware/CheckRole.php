<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Check if the authenticated user has the required role
        if (Auth::check() && Auth::user()->accounttype === $role) {
            return $next($request);
        }
        
        // Redirect if not authorized
        return redirect()->route('/')->with('error', 'You do not have permission to access this page.');
    }
}
