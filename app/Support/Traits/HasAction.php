<?php

namespace App\Support\Traits;

/**
 * @method main()
 */
trait HasAction
{
    public static function handle(...$args)
    {
        return (new self)->main(...$args);
    }
}
