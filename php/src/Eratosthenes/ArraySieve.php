<?php

namespace App\Eratosthenes;

class ArraySieve
{
    use Sieve;

    protected array $isPrime;

    public function __construct(int $size)
    {
        $this->size    = $size;
        $this->isPrime = [];
    }
}
