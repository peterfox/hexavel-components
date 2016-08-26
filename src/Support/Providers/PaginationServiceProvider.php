<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 */

namespace Hexavel\Support\Providers;

use Illuminate\Pagination\PaginationServiceProvider as BaseServiceProvider;

class PaginationServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pagination');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../../resources/views' => base_path('support/resources/views/vendor/pagination'),
            ], 'laravel-pagination');
        }
    }
}