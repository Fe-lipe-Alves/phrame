<?php

namespace App\View\Components\Button;

use App\View\Traits\AsButton;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LinkButton extends Component
{
    use AsButton;

    public function __construct(
        public string $to,
        public string $size = 'md',
        public string $color = 'black',
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.link-button');
    }
}
