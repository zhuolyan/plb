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
    public function benchColdFixedSieveEasy(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdDynamicSieveEasy(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmFixedSieveEasy(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmDynamicSieveEasy(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdFixedSieveMiddle(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdDynamicSieveMiddle(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmFixedSieveMiddle(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmDynamicSieveMiddle(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdFixedSieveHard(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdDynamicSieveHard(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmFixedSieveHard(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmDynamicSieveHard(array $params): void
    {
        $this->splSieve($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider('size', 10, 60_000, 10);
    }

    public function middleDataProvider(): array
    {
        return $this->dataProvider('size', 60_010, 8_200_000, 20_000);
    }

    public function hardDataProvider(): array
    {
        return $this->dataProvider('size', 8_200_000, 1_000_000_000, 2_000_000);
    }

    private function splSieve(array $params): void
    {
        new FixedSieve($params['size'])->sieve();
    }

    private function arraySieve(array $params): void
    {
        new DynamicSieve($params['size'])->sieve();
    }
}
