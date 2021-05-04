<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'layouts.cms.sidebar',
            'layouts.site.header',
        ], function ($view){
            $currentUser = Auth::user();
            if ($currentUser) {
                $view->with(['currentUser' => $currentUser]);
            }
        });
    }
}
