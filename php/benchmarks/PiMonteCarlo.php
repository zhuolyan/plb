<?php

namespace App\Benchmarks;

use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;

class PiMonteCarlo
{
    public float $pi = 0.0;
    use DataProviderTrait;

    #[Iterations(10)]
    #[Groups(["easy", "pi-monte-carlo"])]
    #[ParamProviders('easyDataProvider')]
    public function benchPiMonteCarloEasy(array $params): void
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

        $this->pi = 4 * ($inside / $size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "pi-monte-carlo"])]
    #[ParamProviders('midletDataProvider')]
    public function benchPiMonteCarloMiddle(array $params): void
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

        $this->pi = 4 * ($inside / $size);
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
