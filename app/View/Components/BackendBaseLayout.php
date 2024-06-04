<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class BackendBaseLayout extends Component
{
    /**
     * Create the component instance.
     */
    public function __construct(
        public bool $enableRecaptcha = false,
    ) {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.backend.base');
    }
}
