<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseCommand;

class ConsoleMakeCommand extends BaseCommand
{
    use NameSpaceCorrectionTrait;

    protected $description = 'Create a new Artisan command (Hexavel Modified)';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Laravel\Console\Commands';
    }
}