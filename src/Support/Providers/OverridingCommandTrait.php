<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Support\Providers;

use Illuminate\Console\Events\ArtisanStarting;
use Illuminate\Contracts\Events\Dispatcher;

trait OverridingCommandTrait
{
    /**
     * Forces the Laravel service container to override the default commands with ones used for Hexavel
     *
     * @param Dispatcher $events
     * @param $id
     */
    public function overrideCommand(Dispatcher $events, $id)
    {
        $events->listen(ArtisanStarting::class, function ($event) use ($id) {
            $event->artisan->resolve($id);
        }, -1);
    }
}