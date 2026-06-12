<?php

namespace App\Benchmarks;

use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class PiMonteCarloBenchmark
{
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchColdPiMonteCarloEasy(int $size): float
    {
        return $this->calculate($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchWarmPiMonteCarloEasy(int $size): float
    {
        return $this->calculate($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchColdPiMonteCarloMiddle(int $size): float
    {
        return $this->calculate($size);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchWarmPiMonteCarloMiddle(int $size): float
    {
        return $this->calculate($size);
    }

    public function easyDataProvider(): array
    {
        return $this->dataProvider(1_000, 1_000_000, 1_000);
    }

    public function midletDataProvider(): array
    {
        return $this->dataProvider(1_000_000, 1_000_000_000, 1_000_000);
    }

    private function calculate($size): float
    {
        $inside = 0;
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
