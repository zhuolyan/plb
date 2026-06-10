<?php

namespace App\NBodySimulation;

class ArrayNBodySimulation
{
    use NBodySimulationTrait;

    protected array $bodies = [];

    public function __construct(protected readonly int $steps_count)
    {
        $this->init();
    }

    public function run(): array
    {
        // Main simulation cycle (Time Stepping)
        $this->simulate();

        return $this->bodies;
    }
}
