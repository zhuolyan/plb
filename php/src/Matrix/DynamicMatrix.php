<?php

namespace App\Matrix;

class DynamicMatrix
{
    use MatrixMultiplicationTrait;

    protected(set) array $value;

    public function __construct(private(set) readonly int $size, bool $feel_rand)
    {
        $this->value = [];

        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                $this->value[$i][$j] = $feel_rand ? rand(0, 255) : 0;
            }
        }
    }
}
