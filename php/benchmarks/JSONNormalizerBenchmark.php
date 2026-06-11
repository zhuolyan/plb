<?php

namespace App\Benchmarks;

use App\JSONKeyNormalizer\FullLoadNormalizer;
use App\JSONKeyNormalizer\ReadFromStreamNormalizer;
use PhpBench\Attributes\Groups;
use PhpBench\Attributes\Iterations;
use PhpBench\Attributes\Warmup;

class JSONNormalizerBenchmark
{
    #[Iterations(10)]
    #[Groups(["json-normalizer"])]
    public function benchColdFullLoad(): void
    {
        new FullLoadNormalizer()->run();
    }

    #[Iterations(1)]
    #[Groups(["json-normalizer"])]
    public function benchColdReadFromStream(): void
    {
        new ReadFromStreamNormalizer()->run();
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["json-normalizer"])]
    public function benchWarmFullLoad(): void
    {
        new FullLoadNormalizer()->run();
    }

    #[Iterations(10)]
    #[Warmup(1_000)]
    #[Groups(["json-normalizer"])]
    public function benchWarmReadFromStream(): void
    {
        new ReadFromStreamNormalizer()->run();
    }
}
