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
            'cms.students.show',
        ], function ($view) {
            $currentUser = Auth::user();
            if ($currentUser) {
                $view->with(['currentUser' => $currentUser]);
            }
        });

        // Chat's Sidebar
        view()->composer('layouts.chat.sidebar', function ($view) {
            $currentUser = auth()->user();
            if ($currentUser->hasRole(['teacher', 'admin'])) {
                $contacts = $currentUser->getMyStudents();
            } else {
                $contacts = $currentUser->getMyTeachers();
            }

            $params = [
                'currentUser' => $currentUser,
                'contacts' => $contacts
            ];

            if ($currentUser->hasRole(["admin", "teacher"])) {
                $params['contacts'] = $currentUser->getMyStudents();
            }

            $view->with($params);
        });
    }
}
