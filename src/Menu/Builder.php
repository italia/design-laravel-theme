<?php

namespace italia\DesignLaravelTheme\Menu;


class Builder
{
    public $menu = [];
    public $slim_header_menu = [];
    public $header_menu = [];
    public $footer_menu = [];
    public $footer_bar = [];

    /**
     * @var array
     */
    private $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }



    public function add_slim_header()
    {
        $items = $this->transformItems(func_get_args());
        foreach ($items as $item) {
            array_push($this->slim_header_menu, $item);
        }
    }

    public function add_header()
    {
        $items = $this->transformItems(func_get_args());
        foreach ($items as $item) {
            array_push($this->header_menu, $item);
        }
    }

    public function add_footer()
    {
        $items = $this->transformItems(func_get_args());
        foreach ($items as $item) {
            array_push($this->footer_menu, $item);
        }
    }

    public function add_footer_bar()
    {
        $items = $this->transformItems(func_get_args());
        foreach ($items as $item) {
            array_push($this->footer_bar, $item);
        }
    }

    public function transformItems($items)
    {
        return array_filter(array_map([$this, 'applyFilters'], $items));
    }

    protected function applyFilters($item)
    {
        if (is_string($item)) {
            return $item;
        }

        foreach ($this->filters as $filter) {
            $item = $filter->transform($item, $this);
        }

        if (isset($item['header'])) {
            $item = $item['header'];
        }

        return $item;
    }
}