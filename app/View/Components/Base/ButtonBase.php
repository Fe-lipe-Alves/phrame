<?php

namespace App\View\Components\Base;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonBase extends Component
{
    public string $sized;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $size = 'md'
    ) {
        $this->setSize();
    }

    public function setSize(): void
    {
        $this->sized = match ($this->size) {
            'sm' => 'text-md py-1 px-2',
            'md' => 'text-lg py-2 px-4',
            'lg' => 'text-xl py-3 px-6',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base.button-base');
    }
}
