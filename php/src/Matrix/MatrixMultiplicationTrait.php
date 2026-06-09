<?php

namespace App\Matrix;

trait MatrixMultiplicationTrait
{
    public function multiplication(self $another): self
    {
        $result = new self($this->size, false);

        for ($i = 0; $i < $this->size; $i++) {
            for ($j = 0; $j < $this->size; $j++) {
                for ($k = 0; $k < $this->size; $k++) {
                    $result->value[$i][$j] += $this->value[$i][$k] * $another->value[$k][$j];
                }
            }
        }

        return $result;
    }
}
