<?php

namespace App\NBodySimulation;

trait NBodySimulationTrait
{
    private const int BODY_COUNT = 5;

    private function init(): void
    {
        for ($i = 0; $i < self::BODY_COUNT; $i++) {
            $this->bodies[$i] = new Body();
        }
    }

    private function simulate(): void
    {
        // Main simulation cycle (Time Stepping)
        for ($i = 0; $i < $this->steps_count; $i++) {
            $this->forceCalculation();
            $this->positionIntegration();
        }
    }

    /**
     * Displace each body according to the obtained velocity
     *
     * @return void
     */
    private function positionIntegration(): void
    {
        foreach ($this->bodies as $body) {
            /**
             * @var Body $body
             */
            $body->positionIntegration();
        }
    }

    /**
     * Calculate the total gravitational force acting on each body from all others.
     *
     * @return void
     */
    private function forceCalculation(): void
    {
        for ($i = 0; $i < self::BODY_COUNT; $i++) {
            for ($j = 0; $j < self::BODY_COUNT; $j++) {
                if ($i === $j) {
                    continue;
                }
                /**
                 * @var Body $current_body
                 * @var Body $another_body
                 */
                $current_body = $this->bodies[$i];
                $another_body = $this->bodies[$j];

                $current_body->updateVelocity($another_body);
            }
        }
    }
}
