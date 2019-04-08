<?php

use Illuminate\Http\Request;
use Illuminate\Auth\Access\Gate;
use Illuminate\Auth\GenericUser;
use Illuminate\Events\Dispatcher;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Routing\RouteCollection;
use italia\DesignLaravelTheme\BootstrapItalia;
use italia\DesignLaravelTheme\Menu\Builder;
use italia\DesignLaravelTheme\Menu\ActiveChecker;
use italia\DesignLaravelTheme\Menu\Filters\GateFilter;
use italia\DesignLaravelTheme\Menu\Filters\HrefFilter;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use italia\DesignLaravelTheme\Menu\Filters\ActiveFilter;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class TestCase extends PHPUnit_Framework_TestCase
{
    private $dispatcher;

    private $routeCollection;

    protected function makeMenuBuilder($uri = 'http://example.com', GateContract $gate = null)
    {
        return new Builder([
            new HrefFilter($this->makeUrlGenerator($uri)),
            new ActiveFilter($this->makeActiveChecker($uri)),
            new GateFilter($gate ?: $this->makeGate()),
        ]);
    }

    protected function makeActiveChecker($uri = 'http://example.com')
    {
        return new ActiveChecker($this->makeRequest($uri), $this->makeUrlGenerator($uri));
    }

    private function makeRequest($uri)
    {
        return Request::createFromBase(SymfonyRequest::create($uri));
    }

    protected function makeBootstrapItalia()
    {
        return new BootstrapItalia($this->getFilters(), $this->getDispatcher(), $this->makeContainer());
    }

    protected function makeUrlGenerator($uri = 'http://example.com')
    {
        return new UrlGenerator($this->getRouteCollection(), $this->makeRequest($uri));
    }

    protected function makeGate()
    {
        $userResolver = function () {
            return new GenericUser([]);
        };

        return new Gate($this->makeContainer(), $userResolver);
    }

    protected function makeContainer()
    {
        return new Illuminate\Container\Container();
    }

    protected function getDispatcher()
    {
        if (! $this->dispatcher) {
            $this->dispatcher = new Dispatcher;
        }

        return $this->dispatcher;
    }

    private function getFilters()
    {
        return [];
    }

    protected function getRouteCollection()
    {
        if (! $this->routeCollection) {
            $this->routeCollection = new RouteCollection();
        }

        return $this->routeCollection;
    }
}
