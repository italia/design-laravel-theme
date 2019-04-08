<?php

namespace italia\DesignLaravelTheme\Events;


use italia\DesignLaravelTheme\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}