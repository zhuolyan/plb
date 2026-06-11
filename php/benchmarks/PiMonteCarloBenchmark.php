<?php

namespace App\Benchmarks;

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
        $this->pi = $this->calculate($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmPiMonteCarloEasy(array $params): void
    {
        $this->pi = $this->calculate($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchColdPiMonteCarloMiddle(array $params): void
    {
        $this->pi = $this->calculate($params);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchWarmPiMonteCarloMiddle(array $params): void
    {
        $this->pi = $this->calculate($params);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(1_000, 1_000_000, 1_000);
    }

    public function midletDataProvider(): array
    {
        return $this->dataProvider(1_000_000, 1_000_000_000, 1_000_000);
    }

    private function calculate($params): float
    {
        $inside = 0;
        $size   = $params['size'];
        for ($i = 0; $i < $size; $i++) {
            $x = mt_rand() / mt_getrandmax();
            $y = mt_rand() / mt_getrandmax();
            if (($x * $x + $y * $y) <= 1.0) {
                $inside++;
            }
        }

        return 4 * ($inside / $size);
    }
}
