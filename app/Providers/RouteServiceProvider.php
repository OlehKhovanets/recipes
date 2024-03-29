<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';
    public const ADMIN = '/';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
     protected $adminNamespace = 'App\\Http\\Admin\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
//            Route::prefix('api')
//                ->middleware(['api', 'user_activity'])
//                ->namespace($this->namespace)
//                ->name('api.')
//                ->group(base_path('routes/api.php'));

//            Route::middleware(['web', 'authorize_via_qr'])
////            Route::middleware(['web', 'user_activity', 'authorize_via_qr'])
//                ->namespace($this->namespace)
//                ->group(base_path('routes/web.php'));


            Route::middleware(['web'])
//            Route::middleware(['web', 'user_activity', 'authorize_via_qr'])
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            Route::prefix('admin')
//              prefix('baf87124eecda750f3ab3b4f9db9bc60/admin')
                ->middleware('web')
                ->namespace($this->adminNamespace)
                ->group(base_path('routes/admin/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
