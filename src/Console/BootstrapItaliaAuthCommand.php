<?php

namespace italia\DesignLaravelTheme\Console;

use Laravel\Ui\AuthCommand;

class BootstrapItaliaAuthCommand extends AuthCommand
{
    protected $signature = 'make:bootstrapitalia { type=bootstrap : The preset type (bootstrap) }{--views : Only scaffold the authentication views}{--force : Overwrite existing views by default}';

    protected $description = 'Scaffold basMakeBootstrapItaliaCommandic BootstrapItalia login and registration views and routes';

    protected $bootstrapItaliaViews = [
        /* Auth views, not implemented yet
        'auth/login.stub'                      => 'auth/login.blade.php',
        'auth/register.stub'                   => 'auth/register.blade.php',
        'auth/passwords/email.stub'            => 'auth/passwords/email.blade.php',
        'auth/passwords/reset.stub'            => 'auth/passwords/reset.blade.php',
        */
        'home.stub'                            => 'home.blade.php',
        'vendor/pagination/bootstrap-4.stub'   => 'vendor/pagination/bootstrap-4.blade.php',
    ];

    public function handle()
    {
        parent::handle();

        $this->info('Bootstrap-italia scaffolding generated successfully.');
    }

    protected function ensureDirectoriesExist()
    {
        parent::ensureDirectoriesExist();

        if (! is_dir($directory = resource_path('views/vendor/pagination'))) {
            mkdir($directory, 0755, true);
        }
    }

    protected function exportViews()
    {
        parent::exportViews();

        foreach ($this->bootstrapItaliaViews as $key => $value) {
            copy(__DIR__.'/stubs/make/views/'.$key,
                base_path('resources/views/'.$value));
        }
    }
}
