<?php

use \italia\DesignLaravelTheme\Events\BuildingMenu;

class BootstrapItaliaTest extends TestCase
{
    public function testHeaderMenu()
    {
        $bootstrapItalia = $this->makeBootstrapItalia();

        $this->getDispatcher()->listen(
            BuildingMenu::class,
            function (BuildingMenu $event) {
                $event->menu->add_header(['text' => 'Home']);
            }
        );

        $menu = $bootstrapItalia->menu();
        $this->assertEquals('Home', $menu['header-menu'][0]['text']);
    }

    public function testSlimHeaderMenu()
    {
        $bootstrapItalia = $this->makeBootstrapItalia();

        $this->getDispatcher()->listen(
            BuildingMenu::class,
            function (BuildingMenu $event) {
                $event->menu->add_slim_header(['text' => 'Home']);
            }
        );

        $menu = $bootstrapItalia->menu();
        $this->assertEquals('Home', $menu['slim-header-menu'][0]['text']);
    }

    public function testFooterMenu()
    {
        $bootstrapItalia = $this->makeBootstrapItalia();

        $this->getDispatcher()->listen(
            BuildingMenu::class,
            function (BuildingMenu $event) {
                $event->menu->add_footer(['text' => 'Home']);
            }
        );

        $menu = $bootstrapItalia->menu();
        $this->assertEquals('Home', $menu['footer-menu'][0]['text']);
    }

    public function testFooterBarMenu()
    {
        $bootstrapItalia = $this->makeBootstrapItalia();

        $this->getDispatcher()->listen(
            BuildingMenu::class,
            function (BuildingMenu $event) {
                $event->menu->add_footer_bar(['text' => 'Home']);
            }
        );

        $menu = $bootstrapItalia->menu();
        $this->assertEquals('Home', $menu['footer-bar'][0]['text']);
    }
}