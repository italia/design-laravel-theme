<?php

namespace italia\DesignLaravelTheme\Http\ViewComposers;

use Illuminate\View\View;
use italia\DesignLaravelTheme\BootstrapItalia;

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