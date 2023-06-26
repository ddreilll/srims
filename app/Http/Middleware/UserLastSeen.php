<?php

namespace App\Http\Middleware;

use Closure;

class UserLastSeen
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Update last_seen column if the user is authenticated
        if (auth()->check() && auth()->user()->is_active) {
            $user = auth()->user();
            $user->last_seen = now();
            $user->save();
        }

        return $response;
    }
}



