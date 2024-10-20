<?php

namespace App\Providers;

use App\Generator\ViteDeferGenerator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('viteDeferredScripts', function ($expression) {
            return "<?php echo preg_replace('/<script/', '<script defer async=false ', Vite::withEntryPoints({$expression})->toHtml()); ?>";
        });
    }
}
