<?php

namespace App\Benchmarks;

use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;

class RegexpBenchmark
{
    use DataProviderTrait;

    private const PATTERN = '/^(a+)+$/';
    private int|false $result = false;

    #[Iterations(10)]
    #[Groups(["regexp"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchCold(array $params): void
    {
        $str          = str_repeat("a", $params['size']) . "b";
        $this->result = preg_match(self::PATTERN, $str);
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["regexp"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarm(array $params): void
    {
        $this->benchCold($params);
    }

    public function defaultDataProvider(): array
    {
        return $this->dataProvider('size', 255, 1000, 255);
    }
}
