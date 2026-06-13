<?php

namespace App\Benchmarks;

use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class RegexpBenchmark
{
    use DataProviderTrait;

    private const string PATTERN = '/^(a+)+$/';

    #[Iterations(10)]
    #[Groups(["regexp"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchCold(int $size): int|false
    {
        $str = str_repeat("a", $size) . "b";

        return preg_match(self::PATTERN, $str);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["regexp"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarm(int $size): int|false
    {
        return $this->benchCold($size);
    }

    public function defaultDataProvider(): array
    {
        return $this->dataProvider(255, 1000);
    }
}
