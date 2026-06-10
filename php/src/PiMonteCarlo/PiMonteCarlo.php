<?php

namespace App\PiMonteCarlo;

class PiMonteCarlo
{
    public static function calculate(array $params): float
    {
        $inside = 0;
        $size   = $params['size'];
        for ($i = 0; $i < $size; $i++) {
            $x = mt_rand() / mt_getrandmax();
            $y = mt_rand() / mt_getrandmax();
            if (($x * $x + $y * $y) <= 1.0) {
                $inside++;
            }
        }

        return 4 * ($inside / $size);
    }
}
