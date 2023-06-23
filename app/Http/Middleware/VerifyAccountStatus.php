<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccountStatus
{
    public function handle($request, Closure $next)
    {
        // Check if user account is active
        if (auth()->check() && !auth()->user()->is_active) {
            if (!$request->routeIs('users.deactivated')) {
                return redirect()->route('users.deactivated');
            }
        }

        return $next($request);
    }
}
