<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\ModelMakeCommand as BaseCommand;

class ModelMakeCommand extends BaseCommand
{
    protected $description = 'Create a new Eloquent model class (Hexavel Modified)';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Bridge\Eloquent\Model';
    }
}