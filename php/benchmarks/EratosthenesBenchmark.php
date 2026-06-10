<?php

namespace App\Benchmarks;

use App\Eratosthenes\ArraySieve;
use App\Eratosthenes\SplSieve;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;

class EratosthenesBenchmark
{
    use DataProviderTrait;

    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchArraySieveEasy(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Groups(["easy", "eratosthenes"])]
    #[ParamProviders('easyDataProvider')]
    public function benchSplSieveEasy(array $params): void
    {
        $this->splSieve($params);
    }

    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchArraySieveMiddle(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Groups(["middle", "eratosthenes"])]
    #[ParamProviders('middleDataProvider')]
    public function benchSplSieveMiddle(array $params): void
    {
        $this->splSieve($params);
    }

    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchArraySieveHard(array $params): void
    {
        $this->arraySieve($params);
    }

    #[Groups(["hard", "eratosthenes"])]
    #[ParamProviders('hardDataProvider')]
    public function benchSplSieveHard(array $params): void
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
