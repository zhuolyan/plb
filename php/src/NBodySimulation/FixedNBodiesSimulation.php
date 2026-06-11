<?php

namespace App\NBodySimulation;

use SplFixedArray;

class FixedNBodiesSimulation
{
    use NBodySimulationTrait;

    protected SplFixedArray $bodies;

    public function __construct(protected readonly int $steps_count)
    {
        $this->bodies = new SplFixedArray(self::BODY_COUNT);

        $this->init();
    }

    public function run(): SplFixedArray
    {
        $this->simulate();

        return $this->bodies;
    }
}
