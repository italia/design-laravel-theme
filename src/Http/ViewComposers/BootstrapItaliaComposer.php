<?php

namespace robertogallea\LaravelBootstrapItalia\Http\ViewComposers;

use Illuminate\View\View;
use robertogallea\LaravelBootstrapItalia\BootstrapItalia;

class BootstrapItaliaComposer
{
    /**
     * @var BootstrapItalia
     */
    private $bootstrapItalia;

    public function __construct(
        BootstrapItalia $bootsrapItalia
    ) {
        $this->bootstrapItalia = $bootsrapItalia;
    }

    public function compose(View $view)
    {
        $view->with('bootstrapItalia', $this->bootstrapItalia);
    }
}