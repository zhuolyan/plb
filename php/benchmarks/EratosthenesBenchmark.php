<?php

namespace App\Benchmarks;

use App\Eratosthenes\DynamicSieve;
use App\Eratosthenes\FixedSieve;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class EratosthenesBenchmark
{
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdFixedSieveEasy(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdDynamicSieveEasy(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmFixedSieveEasy(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmDynamicSieveEasy(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdFixedSieveMiddle(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdDynamicSieveMiddle(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmFixedSieveMiddle(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmDynamicSieveMiddle(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdFixedSieveHard(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdDynamicSieveHard(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmFixedSieveHard(int $size): int
    {
        return $this->fixedSieve($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmDynamicSieveHard(int $size): int
    {
        return $this->dynamicSieve($size);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(10, 60_000, 10);
    }

    public function middleDataProvider(): array
    {
        return $this->dataProvider(60_010, 8_200_000, 20_000);
    }

    public function hardDataProvider(): array
    {
        return $this->dataProvider(8_200_000, 1_000_000_000, 2_000_000);
    }

    private function dynamicSieve(int $size): int
    {
        return new DynamicSieve($size)->sieve();
    }

    private function fixedSieve(int $size): int
    {
        return new FixedSieve($size)->sieve();
    }
}
