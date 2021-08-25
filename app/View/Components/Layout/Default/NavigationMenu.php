<?php

namespace App\View\Components\Layout\Default;

use Illuminate\View\Component;

class NavigationMenu extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('components.layout.default.navigation-menu');
    }
}
