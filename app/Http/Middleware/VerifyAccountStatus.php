<?php

namespace App\Http\Middleware;

use Closure;

class VerifyAccountStatus
{
    public function handle($request, Closure $next)
    {
        // Check if user account is active
        if (auth()->check() && !auth()->user()->is_active) {
            auth()->logout();

            return redirect()->route('login')->with('error', __('auth.account_deactivated'));
        }

        return $next($request);
    }
}
