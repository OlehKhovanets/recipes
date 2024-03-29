<?php

namespace App\Http\Admin\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect(route('admin.sign-in'));
        }

        if (Auth::user()->is_admin) {
            return $next($request);
        }
        abort(403);
    }
}
