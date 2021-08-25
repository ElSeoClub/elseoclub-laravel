<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CardImage extends Component
{
    public function __construct(public $image)
    {
    }

    public function render()
    {
        return view('components.card-image');
    }
}
