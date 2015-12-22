<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-component
 */

namespace Hexavel\Support\Providers;

use Hexavel\Console\AppNameCommand;
use Illuminate\Console\Events\ArtisanStarting;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class NameCommandProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(ArtisanStarting::class, function ($event) {
            $event->artisan->resolve('command.hexapp.name');
        }, -1);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.hexapp.name', function ($app) {
            return new AppNameCommand($app['composer'], $app['files']);
        });
    }
}