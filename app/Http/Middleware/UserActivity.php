<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use App\Models\UserActivity as UserActivityModel;

class UserActivity
{
    public function handle($request, Closure $next)
    {
        $ip = request()->ip();
        $userActivity = UserActivityModel::query()
            ->where('ip', $ip)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (!$userActivity) {
            UserActivityModel::query()->create([
                'ip' => $ip
            ]);
        }
        return $next($request);
    }
}
