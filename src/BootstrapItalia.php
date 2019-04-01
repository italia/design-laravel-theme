<?php

namespace robertogallea\LaravelBootstrapItalia;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Container\Container;
use robertogallea\LaravelBootstrapItalia\Menu\Builder;
use robertogallea\LaravelBootstrapItalia\Events\BuildingMenu;

class BootstrapItalia
{
    protected $menu;

    protected $filters;

    protected $events;

    protected $container;

    public function __construct(
        array $filters,
        Dispatcher $events,
        Container $container
    ) {
        $this->filters = $filters;
        $this->events = $events;
        $this->container = $container;
    }

    public function menu()
    {
        if (! $this->menu) {
            $this->menu = $this->buildMenu();
        }

        return $this->menu;
    }

    protected function buildMenu()
    {
        $builder = new Builder($this->buildFilters());

        if (method_exists($this->events, 'dispatch')) {
            $this->events->dispatch(new BuildingMenu($builder));
        } else {
            $this->events->fire(new BuildingMenu($builder));
        }

        return [
            'slim-header-menu' => $builder->slim_header_menu,
            'header-menu' => $builder->header_menu,
            'footer-menu' => $builder->footer_menu,
            'footer-bar' => $builder->footer_bar,
        ];
    }

    protected function buildFilters()
    {
        return array_map([$this->container, 'make'], $this->filters);
    }
}