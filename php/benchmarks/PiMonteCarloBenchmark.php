<?php

namespace App\Benchmarks;

use App\PiMonteCarlo\PiMonteCarlo;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;

class PiMonteCarloBenchmark
{
    public float $pi = 0.0;
    use DataProviderTrait;

    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchPiMonteCarloEasy(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchPiMonteCarloMiddle(array $params): void
    {
        $this->pi = PiMonteCarlo::calculate($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider('size', 1_000, 1_000_000, 1_000);
    }

    public function midletDataProvider(): array
    {
        return $this->dataProvider('size', 1_000_000, 1_000_000_000, 1_000_000);
    }
}
