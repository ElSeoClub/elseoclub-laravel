<?php

namespace App\View\Components\Layout\Default;

use Illuminate\View\Component;

class NavigationMenuOption extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $route = '#', public string $icon = 'fas fa-home', public string $activeRoute = 'THE_ROUTE.NAME', public $onclick = null)
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
        return view('components.layout.default.navigation-menu-option');
    }
}
