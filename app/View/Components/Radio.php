<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Radio extends Component
{
    public function __construct(public string $name, public string $color = 'gray', public $model = null, public $checked = null, public $value = '')
    {
    }

    public function render()
    {
        return view('components.radio');
    }
}
