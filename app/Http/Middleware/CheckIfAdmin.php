<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Enums\UserRole;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is logged in AND has the admin role
            if (auth()->check() && auth()->user()->role === UserRole::Admin) {
                return $next($request); // Allow them through
            }

        // Otherwise, redirect them with a warning
            return redirect('/dashboard')->with('error', 'You do not have admin access.');
    }
}
