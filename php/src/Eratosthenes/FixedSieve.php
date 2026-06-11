<?php

namespace App\Eratosthenes;

use SplFixedArray;

class FixedSieve
{
    use SieveTrait;

    protected SplFixedArray $isPrime;

    public function __construct(int $size)
    {
        $this->size    = $size;
        $this->isPrime = new SplFixedArray($size + 1);
    }
}
