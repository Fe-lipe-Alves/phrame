<?php

namespace App\View\Components\Base;

use App\View\Traits\AsButton;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonBase extends Component
{
    use AsButton;

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.button-base');
    }
}
