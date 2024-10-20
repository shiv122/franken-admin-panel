<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
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
        $admin_menu = json_decode(file_get_contents(base_path('resources/menu/admin-menu.json')), false);

        // Share all menuData to all the views
        View::share('menu', [
            'admin' => $admin_menu,
        ]);
    }
}
