<?php

namespace App\Benchmarks;

use App\Eratosthenes\ArraySieve;
use App\Eratosthenes\SplSieve;
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
    public function benchColdArraySieveEasy(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdSplSieveEasy(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmArraySieveEasy(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmSplSieveEasy(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdArraySieveMiddle(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchColdSplSieveMiddle(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmArraySieveMiddle(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchWarmSplSieveMiddle(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdArraySieveHard(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchColdSplSieveHard(array $params): void
    {
        $this->splSieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmArraySieveHard(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchWarmSplSieveHard(array $params): void
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
        new SplSieve($params['size'])->sieve();
    }

    private function arraySieve(array $params): void
    {
        new ArraySieve($params['size'])->sieve();
    }
}
