<?php
/**
 * @author      Peter Fox <peter.fox@peterfox.me>
 * @copyright   Peter Fox 2016
 *
 * @package     hexavel-component
 */

namespace Hexavel\Console;

use Illuminate\Auth\Console\MakeAuthCommand as BaseCommand;

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

            $this->info('Updated Routes File.');

            file_put_contents(
                app_path('Laravel/Http/routes.php'),
                file_get_contents(__DIR__.'/stubs/make/routes.stub'),
                FILE_APPEND
            );
        }

        $this->comment('Authentication scaffolding generated successfully!');
    }

    /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories()
    {
        if (! is_dir(base_path('support/resources/views/layouts'))) {
            mkdir(base_path('support/resources/views/layouts'), 0755, true);
        }

        if (! is_dir(base_path('support/resources/views/auth/passwords'))) {
            mkdir(base_path('support/resources/views/auth/passwords'), 0755, true);
        }

        if (! is_dir(base_path('support/resources/views/auth/emails'))) {
            mkdir(base_path('support/resources/views/auth/emails'), 0755, true);
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
            $path = base_path('support/resources/views/'.$value);

            $this->line('<info>Created View:</info> '.$path);

            copy(__DIR__.'/stubs/make/views/'.$key, $path);
        }
    }

    /**
     * Compiles the HomeController stub.
     *
     * @return string
     */
    protected function compileControllerStub()
    {
        return str_replace(
            '{{namespace}}',
            $this->getAppNamespace(),
            file_get_contents(__DIR__.'/stubs/make/controllers/HomeController.stub')
        );
    }
}