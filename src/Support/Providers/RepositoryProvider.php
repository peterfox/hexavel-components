<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-components
 */

namespace Hexavel\Support\Providers;

use Illuminate\Support\ServiceProvider;

abstract class RepositoryProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $repositories = $this->getRepositories();
        $models = $this->getModelRepositories();

        foreach ($models as $repository => $model) {
            $this->app->singleton($repository, function ($app) use ($repository, $model) {
                return new $repository($app->make($model));
            });
        }

        foreach ($repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array_merge(
            array_values($this->getRepositories()),
            array_keys($this->getModelRepositories())
        );
    }

    /**
     * @return string[]
     */
    protected abstract function getModelRepositories();

    /**
     * @return string[]
     */
    protected abstract function getRepositories();
}