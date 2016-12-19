<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\NotificationMakeCommand as BaseCommand;

class NotificationMakeCommand extends BaseCommand
{
    use NameSpaceCorrectionTrait;

    protected $description = 'Create a new notification class (Hexavel Modified)';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'Laravel\Notifications';
    }
}