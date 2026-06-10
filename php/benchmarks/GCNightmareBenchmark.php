<?php

namespace App\Benchmarks;

use App\GCNigthmare\Node;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\ParamProviders;
use stdClass;

class GCNightmareBenchmark
{
    use DataProviderTrait;

    private array|object $result = [];

    #[Groups(["easy", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchGCNightmareEasy(array $params): void
    {
        $size = $params['size'];

        for ($i = 0; $i < $size; $i++) {
            $arr          = [];
            $arr["key$i"] = "value$i";

            $this->result = $arr;
        }
    }

    #[Groups(["middle", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchGCNightmareMiddle(array $params): void
    {
        $size = $params['size'];

        for ($i = 0; $i < $size; $i++) {
            $this->result       = new StdClass();
            $this->result->test = "test";
        }
    }

    #[Groups(["hard", "gc-nightmare"])]
    #[ParamProviders('defaultDataProvider')]
    public function benchGCNightmareHard(array $params): void
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

    public function defaultDataProvider(): array
    {
        return $this->dataProvider('size', 10_000, 10_000_000, 10_000);
    }
}
