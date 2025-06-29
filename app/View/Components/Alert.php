<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(public $name = '', public $icon = 'fas fa-check', public $color = 'green')
    {
    }

    public function render()
    {
        return view('components.alert');
    }
}
