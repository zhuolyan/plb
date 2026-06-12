<?php

namespace App\Benchmarks;

use App\GCNightmare\Node;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\ParamProviders;
use PhpBench\Attributes\Warmup;
use stdClass;

class GCNightmareBenchmark
{
    use DataProviderTrait;

    private array|object $result = [];

    #[Iterations(10)]
    #[Groups(["easy", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchColdGCNightmareEasy(int $size): array|object
    {
        for ($i = 0; $i < $size; $i++) {
            $arr          = [];
            $arr["key$i"] = "value$i";

            $this->result = $arr;
        }

        return $this->result;
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareEasy(int $size): array|object
    {
        return $this->benchColdGCNightmareEasy($size);
    }

    #[Iterations(10)]
    #[Groups(["middle", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchColdGCNightmareMiddle(int $size): array|object
    {
        for ($i = 0; $i < $size; $i++) {
            $this->result       = new StdClass();
            $this->result->test = "test";
        }

        return $this->result;
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareMiddle(int $size): array|object
    {
        return $this->benchColdGCNightmareMiddle($size);
    }

    #[Iterations(10)]
    #[Groups(["hard", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchColdGCNightmareHard(int $size): array|object
    {
        for ($i = 0; $i < $size; $i++) {
            $this->result              = new Node();
            $this->result->left        = new Node();
            $this->result->right       = new Node();
            $this->result->right->left = $this->result;
            $this->result->left->right = $this->result->left;
        }

        return $this->result;
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareHard(int $size): array|object
    {
        return $this->benchColdGCNightmareHard($size);
    }

    public function defaultDataProvider(): array
    {
        return $this->dataProvider(10_000, 10_000_000, 10_000);
    }
}
