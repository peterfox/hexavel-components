<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2015
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Foundation\Console\AppNameCommand as BaseCommand;

class AppNameCommand extends BaseCommand
{
    protected $description = 'Set the application namespace (Hexavel Modified)';

    /**
     * Set the bootstrap namespaces.
     *
     * @return void
     */
    protected function setBootstrapNamespaces()
    {
        $search = [
            $this->currentRoot.'\\Laravel\\Http',
            $this->currentRoot.'\\Laravel\\Console',
            $this->currentRoot.'\\Laravel\\Exceptions',
        ];

        $replace = [
            $this->argument('name').'\\Laravel\\Http',
            $this->argument('name').'\\Laravel\\Console',
            $this->argument('name').'\\Laravel\\Exceptions',
        ];

        $this->replaceIn($this->getBootstrapPath(), $search, $replace);
    }

    /**
     * Set the application provider namespaces.
     *
     * @return void
     */
    protected function setAppConfigNamespaces()
    {
        $search = [
            $this->currentRoot.'\\Laravel\\Providers',
            $this->currentRoot.'\\Laravel\\Http\\Controllers\\',
        ];

        $replace = [
            $this->argument('name').'\\Laravel\\Providers',
            $this->argument('name').'\\Laravel\\Http\\Controllers\\',
        ];

        $this->replaceIn($this->getConfigPath('app'), $search, $replace);
    }
}