<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Composers\GlobalComposer;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        // Global
        View::composer(
        // This class binds the $logged_in_user variable to every view
            '*',
            GlobalComposer::class
        );
    }
}
