<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Auth\Console\MakeAuthCommand as BaseCommand;
use Illuminate\Container\Container;

class MakeAuthCommand extends BaseCommand
{
    protected $description = 'Scaffold basic login and registration views and routes (Hexavel Modified)';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $this->createDirectories();

        $this->exportViews();

        if (! $this->option('views')) {
            $this->info('Installed HomeController.');

            file_put_contents(
                app_path('Laravel/Http/Controllers/HomeController.php'),
                $this->compileControllerStub()
            );

            file_put_contents(
                base_path('app/routes/web.php'),
                file_get_contents(__DIR__.'/stubs/make/routes.stub'),
                FILE_APPEND
            );
        }

        $this->info('Authentication scaffolding generated successfully.');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories()
    {
        if (! is_dir(resource_path('views/layouts'))) {
            mkdir(resource_path('views/layouts'), 0755, true);
        }

        if (! is_dir(resource_path('views/auth/passwords'))) {
            mkdir(resource_path('views/auth/passwords'), 0755, true);
        }
    }

    /**
     * Export the authentication views.
     *
     * @return void
     */
    protected function exportViews()
    {
        foreach ($this->views as $key => $value) {
            copy(
                __DIR__.'/stubs/make/views/'.$key,
                resource_path('views/'.$value)
            );
        }
    }

    /**
     * Get the application namespace.
     *
     * @return string
     */
    protected function getAppNamespace()
    {
        return Container::getInstance()->getNamespace().'Laravel\\';
    }
}