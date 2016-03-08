<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Routing\Console\MiddlewareMakeCommand as BaseCommand;

class MiddlewareMakeCommand extends BaseCommand
{
    use NameSpaceCorrectionTrait;

    protected $description = 'Create a new middleware class (Hexavel Modified)';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Laravel\Http\Middleware';
    }
}