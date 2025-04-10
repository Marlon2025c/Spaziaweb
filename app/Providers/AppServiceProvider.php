<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Enregistrez les services de l'application.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap les services de l'application.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'fr_FR.utf8', 'fr_FR.UTF-8', 'fr_FR', 'french');
        Carbon::setLocale('fr');
    }
}
