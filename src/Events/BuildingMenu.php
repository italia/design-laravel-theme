<?php
/**
 * Created by PhpStorm.
 * User: Roberto Gallea
 * Date: 29/03/2019
 * Time: 12:53
 */

namespace robertogallea\LaravelBootstrapItalia\Events;


use robertogallea\LaravelBootstrapItalia\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}