<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public int $margin;

    public function __construct($name, $margin = 0)
    {
        $this->name = $name;
        $this->margin = $margin;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.avatar');
    }
}
