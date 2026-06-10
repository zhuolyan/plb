<?php

namespace App\Benchmarks;

trait DataProviderTrait
{
    protected function dataProvider(string $key, int $start, int $end, int $step = 1): array
    {
        $result = [];
        for ($i = $start; $i <= $end; $i += $step) {
            $result[] = [$key => $i];
        }

        return $result;
    }
}
