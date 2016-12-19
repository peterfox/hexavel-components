<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 */

namespace Hexavel\Support\Providers;

use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider as BaseProvider;

class ConsoleSupportServiceProvider extends BaseProvider
{
    /**
     * The provider class names.
     *
     * @var array
     */
    protected $providers = [
        'Hexavel\Support\Providers\ArtisanServiceProvider',
        'Illuminate\Console\ScheduleServiceProvider',
        'Illuminate\Database\MigrationServiceProvider',
        'Illuminate\Database\SeedServiceProvider',
        'Illuminate\Foundation\Providers\ComposerServiceProvider',
        'Illuminate\Queue\ConsoleServiceProvider',
    ];
}