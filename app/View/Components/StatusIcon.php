<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusIcon extends Component
{
    public function __construct(public string $status)
    {
    }

    public function render()
    {
        return view('components.status-icon');
    }
}
