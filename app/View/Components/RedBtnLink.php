<?php

namespace App\View\Components;

use Illuminate\View\Component;

class RedBtnLink extends Component
{
    public $href;
    public $type;

    public function __construct($href = null, $type = 'button')
    {
        $this->href = $href;
        $this->type = $type;
    }

    public function render()
    {
        return view('components.red-btn-link');
    }
}