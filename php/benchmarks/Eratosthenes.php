<?php

namespace App\Benchmarks;

use App\Eratosthenes\ArraySieve;
use App\Eratosthenes\SplSieve;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class Eratosthenes
{
    #[ParamProviders('sieveProvider')]
    public function benchColdArraySieve(array $size): void
    {
        new ArraySieve($size['size'])->sieve();
    }

    #[ParamProviders('sieveProvider')]
    public function benchColdSplSieve(array $size): void
    {
        new SplSieve($size['size'])->sieve();
    }

    #[Warmup(5_000)]
    #[ParamProviders('sieveProvider')]
    public function benchWarmArraySieve(array $size): void
    {
        new ArraySieve($size['size'])->sieve();
    }

    #[Warmup(5_000)]
    #[ParamProviders('sieveProvider')]
    public function benchWarmSplSieve(array $params): void
    {
        new SplSieve(0)->sieve();
    }

    public function sieveProvider(): array
    {
        $result = [];
        for ($i = 1_000; $i <= 1_000_000_000; $i += 1_000) {
            $result[] = ['size' => $i];
        }

        return $result;
    }
}
