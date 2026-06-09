<?php

namespace App\Benchmarks;

trait DataProviderTrait
{
    protected function dataProvider(int $start, int $end, int $step = 1): array
    {
        $result = [];
        for ($i = $start; $i <= $end; $i += $step) {
            $result[] = ['size' => $i];
        }

        return $result;
    }
}
