<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.layout', function ($view) {
            $user = Auth::user();
            if(!$user) {
                return;
            }
            $notifications = $user->unreadNotifications;
            $view->with('_notifications', $notifications);
        });
    }
}
