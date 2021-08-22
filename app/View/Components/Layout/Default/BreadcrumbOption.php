<?php

namespace App\View\Components\Layout\Default;

use Illuminate\View\Component;

class BreadcrumbOption extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $name, public $route = false, public string $arrow = 'true')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.default.breadcrumb-option');
    }
}
