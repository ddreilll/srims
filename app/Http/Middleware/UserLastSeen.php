<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserLastSeen
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Update last_seen column if the user is authenticated
        if (Auth::check()) {
            User::withoutEvents(function () {
                $user = Auth::user();
                $user->last_seen = now();
                $user->save();
            });
        }

        return $response;
    }
}
