<?php

namespace App\Eratosthenes;
trait SieveTrait
{
    protected int $size;

    public function sieve(): int
    {
        for ($i = 2; $i <= $this->size; $i++) {
            $this->isPrime[$i] = true;
        }

        $limit = (int)sqrt($this->size);
        for ($p = 2; $p <= $limit; $p++) {
            if ($this->isPrime[$p]) {
                for ($i = $p * $p; $i <= $this->size; $i += $p) {
                    $this->isPrime[$i] = false;
                }
            }
        }

        $count = 0;
        for ($i = 2; $i <= $this->size; $i++) {
            if ($this->isPrime[$i]) {
                $count++;
            }
        }

        return $count;
    }
}
