<?php

namespace App\View\Traits;

trait AsButton
{
    /**
     * Cria uma nova instância.
     */
    public function __construct(
        public string $size = 'md'
    ) {

    }

    public function sized(): string
    {
        return match ($this->size) {
            'sm' => 'text-md py-1 px-2',
            'md' => 'text-md py-2 px-4',
            'lg' => 'text-lg py-2 px-4',
            'xl' => 'text-xl py-3 px-6',
        };
    }
}
