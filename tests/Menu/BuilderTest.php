<?php

use Illuminate\Routing\Route;

class BuilderTest extends TestCase
{
    public function testAddOneItem()
    {
        $builder = $this->makeMenuBuilder();

        $builder->add_header(['text' => 'Home', 'url' => '/']);

        $this->assertEquals('Home', $builder->header_menu[0]['text']);
        $this->assertEquals('/', $builder->header_menu[0]['url']);
    }

    public function testAddMultipleItems()
    {
        $builder = $this->makeMenuBuilder();

        $builder->add_header(['text' => 'Home', 'url' => '/']);
        $builder->add_header(['text' => 'About', 'url' => '/about']);

        $this->assertEquals('Home', $builder->header_menu[0]['text']);
        $this->assertEquals('/', $builder->header_menu[0]['url']);
        $this->assertEquals('About', $builder->header_menu[1]['text']);
        $this->assertEquals('/about', $builder->header_menu[1]['url']);
    }

    public function testAddMultipleItemsAtOnce()
    {
        $builder = $this->makeMenuBuilder();

        $builder->add_header(
            ['text' => 'Home', 'url' => '/'],
            ['text' => 'About', 'url' => '/about']
        );

        $this->assertEquals('Home', $builder->header_menu[0]['text']);
        $this->assertEquals('/', $builder->header_menu[0]['url']);
        $this->assertEquals('About', $builder->header_menu[1]['text']);
        $this->assertEquals('/about', $builder->header_menu[1]['url']);
    }

    public function testHrefWillBeAdded()
    {
        $builder = $this->makeMenuBuilder();

        $builder->add_header(['text' => 'Home', 'url' => '/']);
        $builder->add_header(['text' => 'About', 'url' => '/about']);

        $this->assertEquals('http://example.com', $builder->header_menu[0]['href']);
        $this->assertEquals(
            'http://example.com/about',
            $builder->header_menu[1]['href']
        );
    }

    public function testDefaultHref()
    {
        $builder = $this->makeMenuBuilder();

        $builder->add_header(['text' => 'Home']);

        $this->assertEquals('#', $builder->header_menu[0]['href']);
    }



    public function testRouteHref()
    {
        $builder = $this->makeMenuBuilder();
        $this->getRouteCollection()->add(new Route('GET', 'about', ['as' => 'pages.about']));

        $builder->add_header(['text' => 'About', 'route' => 'pages.about']);

        $this->assertEquals('http://example.com/about', $builder->header_menu[0]['href']);
    }


    public function testSubmenuActiveWithHash()
    {
        $builder = $this->makeMenuBuilder('http://example.com/home');

        $builder->add_header(
            [
                'url'     => '#',
                'submenu' => [
                    ['url' => 'home'],
                ],
            ]
        );

        $this->assertTrue($builder->header_menu[0]['active']);
    }


    public function testCan()
    {
        $gate = $this->makeGate();
        $gate->define(
            'show-about',
            function () {
                return true;
            }
        );
        $gate->define(
            'show-home',
            function () {
                return false;
            }
        );

        $builder = $this->makeMenuBuilder('http://example.com', $gate);

        $builder->add_header(
            [
                'text' => 'About',
                'url'  => 'about',
                'can'  => 'show-about',
            ],
            [
                'text' => 'Home',
                'url'  => '/',
                'can'  => 'show-home',
            ]
        );

        $this->assertCount(1, $builder->header_menu);
        $this->assertEquals('About', $builder->header_menu[0]['text']);
    }

    public function testCanHeaders()
    {
        $gate = $this->makeGate();
        $gate->define(
            'show-header',
            function () {
                return true;
            }
        );
        $gate->define(
            'show-settings',
            function () {
                return false;
            }
        );

        $builder = $this->makeMenuBuilder('http://example.com', $gate);

        $builder->add_header(
            [
                'header' => 'HEADER',
                'can'  => 'show-header',
            ],
            [
                'header' => 'SETTINGS',
                'can'  => 'show-settings',
            ]
        );

        $this->assertCount(1, $builder->header_menu);
        $this->assertEquals('HEADER', $builder->header_menu[0]);
    }
}