<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Categorie;
use App\Views\composers\NavigationComposer;
use App\Post;

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

        // Elegantno odvojen kod iz kontrolera, index, preview, category metode su sada dosta cistije!
        view()->composer('pages.sidebar', NavigationComposer::class);
      
    }
}
