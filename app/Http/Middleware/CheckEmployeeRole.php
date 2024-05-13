<?php

namespace App\Http\Middleware;

use Closure;

class CheckEmployeeRole
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role === 'employer') {
            return $next($request);
        }

        return redirect()->route('guest.home')->with('error', 'You are not authorized to access this resource.');
    }
}
