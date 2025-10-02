<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AmberBtnLink extends Component
{
    public $href;

    public function __construct($href)
    {
        $this->href = $href;
    }

    public function render()
    {
        return view('components.amber-btn-link');
    }
}