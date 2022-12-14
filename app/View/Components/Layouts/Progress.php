<?php

namespace App\View\Components\Layouts;

use Illuminate\View\Component;

class Progress extends Component
{

    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value)
    {
        $this->value = round($value, 2);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layouts.progress');
    }
}
