<?php

namespace robertogallea\LaravelBootstrapItalia\Menu\Filters;

use robertogallea\LaravelBootstrapItalia\Menu\Builder;
use robertogallea\LaravelBootstrapItalia\Menu\ActiveChecker;

class ActiveFilter implements FilterInterface
{
    private $activeChecker;

    public function __construct(ActiveChecker $activeChecker)
    {
        $this->activeChecker = $activeChecker;
    }

    public function transform($item, Builder $builder)
    {
        if (! isset($item['header'])) {
            $item['active'] = $this->activeChecker->isActive($item);
        }

        return $item;
    }
}