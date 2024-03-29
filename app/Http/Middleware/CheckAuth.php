<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckAuth
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/admin/sign-in');
        }

        return $next($request);
    }
}
