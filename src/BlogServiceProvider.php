<?php

namespace EoxysIT\Blog;

use Illuminate\Support\ServiceProvider;

class BlogServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->loadViewsFrom(__DIR__.'/views', 'blog');
        // $this->publishes([
        //     __DIR__.'/path/to/views' => base_path('resources/views/vendor/blog'),
        // ]);
     
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes/web.php';
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        $this->loadViewsFrom(__DIR__.'/views', 'blog');
        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/vendor/blog'),
        ]);
    }
}
