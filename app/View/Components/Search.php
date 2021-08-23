<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Search extends Component
{
    public function __construct(public string $placeholder = 'Buscar...', public string $model = 'search', public string $debounce = '500')
    {
    }

    public function render()
    {
        return view('components.search');
    }
}
