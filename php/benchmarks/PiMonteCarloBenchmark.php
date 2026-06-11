<?php

namespace App\Benchmarks;

use App\PiMonteCarlo\PiMonteCarlo;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class PiMonteCarloBenchmark
{
    public float $pi = 0.0;
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdPiMonteCarloEasy(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmPiMonteCarloEasy(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchColdPiMonteCarloMiddle(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchWarmPiMonteCarloMiddle(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(1_000, 1_000_000, 1_000);
    }

    public function midletDataProvider(): array
    {
        return $this->dataProvider(1_000_000, 1_000_000_000, 1_000_000);
    }
}
