<?php

namespace App\Benchmarks;

use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;

class RegexpBenchmark
{
    use DataProviderTrait;

    private const PATTERN = '/^(a+)+$/';
    private int|false $result = false;

    #[Groups(["regexp"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchRegexp(array $params): void
    {
        $str          = str_repeat("a", $params['size']) . "b";
        $this->result = preg_match(self::PATTERN, $str);
    }

    public function defaultDataProvider(): array
    {
        return $this->dataProvider('size', 255, 255_000, 255);
    }
}
