<?php

use Illuminate\Config\Repository;
use Illuminate\Events\Dispatcher;
use italia\DesignLaravelTheme\Events\BuildingMenu;
use italia\DesignLaravelTheme\ServiceProvider;

class ServiceProviderTest extends TestCase
{
    public function testRegisterMenu()
    {
        $events = new Dispatcher();
        $config = new Repository(
            ['bootstrap-italia.menu' => [
                    'slim-header' => ['slim_header_item'],
                    'header' => ['header_item'],
                    'footer' => ['footer_item'],
                    'footer-bar' => ['footer_bar_item'],
                ],
            ]
        );

        $menuBuilder = $this->makeMenuBuilder();

        ServiceProvider::registerMenu($events, $config);

        if (method_exists($events, 'dispatch')) {
            $events->dispatch(new BuildingMenu($menuBuilder));
        } else {
            $events->fire(new BuildingMenu($menuBuilder));
        }

        $this->assertEquals(['slim_header_item'], $menuBuilder->slim_header_menu);
        $this->assertEquals(['header_item'], $menuBuilder->header_menu);
        $this->assertEquals(['footer_item'], $menuBuilder->footer_menu);
        $this->assertEquals(['footer_bar_item'], $menuBuilder->footer_bar);
    }
}