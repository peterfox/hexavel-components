<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\MailMakeCommand as BaseCommand;

class MailMakeCommand extends BaseCommand
{
    use NameSpaceCorrectionTrait;

    protected $description = 'Create a new email class (Hexavel Modified)';

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'Laravel\Mail';
    }
}