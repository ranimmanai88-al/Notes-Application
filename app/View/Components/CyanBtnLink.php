<?php

namespace App\View\Components;

use Illuminate\View\Component;

class CyanBtnLink extends Component
{
    public $href;
    
    public function __construct($href = null)
    {
        $this->href = $href;
    }

    public function render()
    {
        return view('components.cyan-btn-link');
    }
}