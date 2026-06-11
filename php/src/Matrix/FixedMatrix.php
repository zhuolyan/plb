<?php

namespace App\Matrix;

use SplFixedArray;

class FixedMatrix
{
    use MatrixMultiplicationTrait;

    protected(set) SplFixedArray $value;

    public function __construct(private(set) readonly int $size, bool $feel_rand)
    {
        $this->value = new SplFixedArray($size);

        for ($i = 0; $i < $this->size; $i++) {
            $this->value[$i] = new SplFixedArray($this->size);
            for ($j = 0; $j < $this->size; $j++) {
                $this->value[$i][$j] = $feel_rand ? rand(0, 255) : 0;
            }
        }
    }
}
