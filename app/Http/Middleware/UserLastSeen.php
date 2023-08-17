<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;

class UserLastSeen
{
    public function handle($request, Closure $next)
    {
        // Update last_seen column if the user is authenticated
        if (auth()->check() && auth()->user()->is_active && auth()->user()->is_approved) {
            $user = auth()->user();
            $user->timestamps = false;
            $user->last_seen = Carbon::now();
            $user->saveQuietly();
        }

        return $next($request);
    }
}
