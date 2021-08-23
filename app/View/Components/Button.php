<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $type;
    public $click;
    public $color;
    public $icon;
    public $href;
    public $class;

    public function __construct($type = 'button', $click = null, $color = 'gray', $icon = null, $href = null, $class = '')
    {
        $this->type = $type;
        $this->click = $click;
        $this->color = $color;
        $this->icon = $icon;
        $this->href = $href;
        $this->class = $class;
    }

    public function render()
    {
        return view('components.button');
    }
}
