<?php

namespace robertogallea\LaravelBootstrapItalia\Menu\Filters;

use robertogallea\LaravelBootstrapItalia\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}