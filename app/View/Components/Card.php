<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public $title;
    public $icon;
    public $color;
    public $footer;

    public function __construct($title = null, $footer = null, $icon = null, $color = 'gray')
    {
        $this->title = $title;
        $this->footer = $footer;
        $this->icon = $icon;
        $this->color = $color;
    }

    public function render()
    {
        return view('components.card');
    }
}
