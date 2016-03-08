<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-component
 */

namespace Hexavel\Support\Providers;

use Hexavel\Console\ConsoleMakeCommand;
use Hexavel\Console\ControllerMakeCommand;
use Hexavel\Console\EventMakeCommand;
use Hexavel\Console\JobMakeCommand;
use Hexavel\Console\ListenerMakeCommand;
use Hexavel\Console\MakeAuthCommand;
use Hexavel\Console\MiddlewareMakeCommand;
use Hexavel\Console\ModelMakeCommand;
use Hexavel\Console\PolicyMakeCommand;
use Hexavel\Console\ProviderMakeCommand;
use Hexavel\Console\RequestMakeCommand;
use Illuminate\Console\Events\ArtisanStarting;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\ServiceProvider;

class MakeCommandProvider extends ServiceProvider
{
    use OverridingCommandTrait;

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        foreach (array_keys($this->getMap()) as $id) {
            $this->overrideCommand($events, $id);
        }
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        foreach($this->getMap() as $id => $class) {
            $this->app->singleton($id, $class);
            $this->commands($id);
        }
    }

    /**
     * @return array
     */
    protected function getMap()
    {
        return [
            'command.make.console' => ConsoleMakeCommand::class,
            'command.make.controller' => ControllerMakeCommand::class,
            'command.make.event' => EventMakeCommand::class,
            'command.make.job' => JobMakeCommand::class,
            'command.make.listener' => ListenerMakeCommand::class,
            'command.make.auth' => MakeAuthCommand::class,
            'command.make.middleware' => MiddlewareMakeCommand::class,
            'command.make.model' => ModelMakeCommand::class,
            'command.make.policy' => PolicyMakeCommand::class,
            'command.make.provider' => ProviderMakeCommand::class,
            'command.make.request' => RequestMakeCommand::class
        ];
    }
}