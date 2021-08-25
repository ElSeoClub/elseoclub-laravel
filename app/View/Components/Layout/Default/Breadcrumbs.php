<?php

namespace App\View\Components\Layout\Default;

use Illuminate\View\Component;

class Breadcrumbs extends Component
{
    public function __construct()
    {
    }

    public function render()
    {
        return view('components.layout.default.breadcrumbs');
    }
}
