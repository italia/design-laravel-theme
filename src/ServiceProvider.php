<?php

namespace italia\DesignLaravelTheme;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Container\Container;
use Illuminate\Pagination\Paginator;
use italia\DesignLaravelTheme\Events\BuildingMenu;
use italia\DesignLaravelTheme\Console\BootstrapItaliaMakeCommand;
use italia\DesignLaravelTheme\Console\MakeBootstrapItaliaCommand;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use italia\DesignLaravelTheme\Http\ViewComposers\BootstrapItaliaComposer;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(BootstrapItalia::class, function (Container $app) {
            return new BootstrapItalia(
                $app['config']['bootstrap-italia.filters'],
                $app['events'],
                $app
            );
        });
    }

    public function boot(
        Factory $view,
        Dispatcher $events,
        Repository $config
    ) {
        $this->loadViews();

        $this->loadTranslations();

        $this->publishConfig();

        $this->publishAssets();

        $this->registerCommands();

        $this->registerViewComposers($view);

        static::registerMenu($events, $config);
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views');

        $this->loadViewsFrom($viewsPath, 'bootstrap-italia');

        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/bootstrap-italia'),
        ], 'views');
    }

    private function loadTranslations()
    {
        $translationsPath = $this->packagePath('resources/lang');

        $this->loadTranslationsFrom($translationsPath, 'bootstrap-italia');

        $this->publishes([
            $translationsPath => base_path('resources/lang/vendor/bootstrap-italia'),
        ], 'translations');
    }

    private function publishConfig()
    {
        $configPath = $this->packagePath('config/bootstrap-italia.php');

        $this->publishes([
            $configPath => config_path('bootstrap-italia.php'),
        ], 'config');

        $this->mergeConfigFrom($configPath, 'bootstrap-italia');
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/bootstrap-italia'),
        ], 'assets');
    }

    private function packagePath($path)
    {
        return __DIR__."/../$path";
    }

    private function registerCommands()
    {
        // Laravel >=5.2 only
        if (class_exists('Illuminate\\Auth\\Console\\MakeAuthCommand')) {
            $this->commands(MakeBootstrapItaliaCommand::class);
        } elseif (class_exists('Illuminate\\Auth\\Console\\AuthMakeCommand')) {
            $this->commands(BootstrapItaliaMakeCommand::class);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('bootstrap-italia::page', BootstrapItaliaComposer::class);
    }

    public static function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('bootstrap-italia.menu');
            call_user_func_array([$event->menu, 'add_slim_header'], $menu['slim-header']);
            call_user_func_array([$event->menu, 'add_header'], $menu['header']);
            call_user_func_array([$event->menu, 'add_footer'], $menu['footer']);
            call_user_func_array([$event->menu, 'add_footer_bar'], $menu['footer-bar']);
        });
    }
}