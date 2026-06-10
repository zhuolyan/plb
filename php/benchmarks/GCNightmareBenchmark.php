<?php

namespace App\Benchmarks;

use App\GCNigthmare\Node;
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
    public function benchColdGCNightmareEasy(array $params): void
    {
        $size = $params['size'];

        for ($i = 0; $i < $size; $i++) {
            $arr          = [];
            $arr["key$i"] = "value$i";

            $this->result = $arr;
        }
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["easy", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareEasy(array $params): void
    {
        $this->benchColdGCNightmareEasy($params);
    }

    #[Iterations(10)]
    #[Groups(["middle", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchColdGCNightmareMiddle(array $params): void
    {
        $size = $params['size'];

        for ($i = 0; $i < $size; $i++) {
            $this->result       = new StdClass();
            $this->result->test = "test";
        }
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["middle", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareMiddle(array $params): void
    {
        $this->benchColdGCNightmareMiddle($params);
    }

    #[Iterations(10)]
    #[Groups(["hard", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchColdGCNightmareHard(array $params): void
    {
        $size = $params['size'];

        for ($i = 0; $i < $size; $i++) {
            $this->result              = new Node();
            $this->result->left        = new Node();
            $this->result->right       = new Node();
            $this->result->right->left = $this->result;
            $this->result->left->right = $this->result->left;
        }
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["hard", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchWarmGCNightmareHard(array $params): void
    {
        $this->benchColdGCNightmareHard($params);
    }

    public function defaultDataProvider(): array
    {
        return $this->dataProvider('size', 1_000, 1_000_000, 1_000);
    }
}
