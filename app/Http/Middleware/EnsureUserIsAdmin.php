<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->check()) {
            return redirect()->route('admin.login');
        }

        if (auth()->user()->role !== 'admin' || ! auth()->user()->is_active) {
            abort(403);
        }

        return $next($request);
    }
}
