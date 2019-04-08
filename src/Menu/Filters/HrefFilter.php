<?php

namespace italia\DesignLaravelTheme\Menu\Filters;

use italia\DesignLaravelTheme\Menu\Builder;
use Illuminate\Contracts\Routing\UrlGenerator;

class HrefFilter implements FilterInterface
{
    protected $urlGenerator;

    public function __construct(UrlGenerator $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function transform($item, Builder $builder)
    {
        if (! isset($item['header'])) {
            $item['href'] = $this->makeHref($item);
            if (isset($item['dropdown'])) {
                foreach ($item['dropdown'] as &$subitem) {
                    if (!(is_string($subitem))) {
                        $subitem['href'] = $this->makeHref($subitem);
                    }
                }
            }

            if (isset($item['megamenu'])) {
                foreach ($item['megamenu'] as &$submenu) {
                    foreach ($submenu as $i => &$subitem) {
                        if (!(is_string($subitem))) {
                            $subitem['href'] = $this->makeHref($subitem);
                        }
                        $submenu[$i] = $subitem;
                    }
                }
            }
        }
        return $item;
    }

    protected function makeHref($item)
    {
        if (isset($item['url'])) {
            return $this->urlGenerator->to($item['url']);
        }

        if (isset($item['route'])) {
            return $this->urlGenerator->route($item['route']);
        }

        return '#';
    }
}