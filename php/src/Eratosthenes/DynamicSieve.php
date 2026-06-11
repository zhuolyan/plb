<?php

namespace App\Eratosthenes;

class DynamicSieve
{
    use SieveTrait;

    protected array $isPrime;

    public function __construct(int $size)
    {
        $this->size    = $size;
        $this->isPrime = [];
    }
}
