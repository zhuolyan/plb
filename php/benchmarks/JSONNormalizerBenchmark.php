<?php

namespace App\Benchmarks;

use App\JSONKeyNormlizer\FullLoadNormalizer;
use App\JSONKeyNormlizer\ReadFromStreamNormalizer;
use PhpBench\Attributes\Groups;

class JSONNormalizerBenchmark
{
    #[Groups(["json-normalizer"])]
    public function benchFullLoad(): void
    {
        new FullLoadNormalizer()->run();
    }

    #[Groups(["json-normalizer"])]
    public function benchReadFromStream(): void
    {
        new ReadFromStreamNormalizer()->run();
    }
}
