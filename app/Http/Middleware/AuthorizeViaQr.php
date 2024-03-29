<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthorizeViaQr
{
    public function handle($request, Closure $next)
    {
        if ($request->has('qr_code')) {
            $user = User::query()->where('qr_token', $request->input('qr_code'))->first();
            if ($user) {
                $user->qr_token = Str::random(60);
                $user->save();

                Auth::login($user);
            }
        }

        return $next($request);
    }
}
