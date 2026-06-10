<?php

namespace App\NBodySimulation;

class Body
{
    /**
     * Integration time step (Delta time)
     */
    private const float DT = 0.01;
    /**
     * "Mitigation" to prevent division by zero if the bodies get close together.
     */
    private const       float SOFTENING = 1e-9;
    public float          $coordinate_x;
    public float          $coordinate_y;
    public float          $coordinate_z;
    public float          $velocity_x = 0.0;
    public float          $velocity_y = 0.0;
    public float          $velocity_z = 0.0;
    public readonly float $mass;

    public function __construct()
    {
        $this->coordinate_x = mt_rand() / mt_getrandmax();
        $this->coordinate_y = mt_rand() / mt_getrandmax();
        $this->coordinate_z = mt_rand() / mt_getrandmax();

        $this->mass = mt_rand() / mt_getrandmax();
    }

    public function updateVelocity(Body $another): void
    {
        $dx = $this->coordinate_x - $another->coordinate_x;
        $dy = $this->coordinate_y - $another->coordinate_y;
        $dz = $this->coordinate_z - $another->coordinate_z;

        // Square distance + softening for stability
        $dist_sq = pow($dx, 2) + pow($dy, 2) + pow($dz, 2) + self::SOFTENING;

        // Newton's law of gravity uses 1/r^2.
        // Since we're working with vectors, we need 1/r^3 for direction.
        $inv_dist3 = pow(1.0 / sqrt($dist_sq), 3);

        // Velocity integration
        // F = G * m1 * m2 / r^2; a = F/m = G * m2 / r^2
        $this->velocity_x += $dx * $another->mass * $inv_dist3 * self::DT;
        $this->velocity_y += $dy * $another->mass * $inv_dist3 * self::DT;
        $this->velocity_z += $dz * $another->mass * $inv_dist3 * self::DT;
    }

    public function positionIntegration(): void
    {
        $this->coordinate_x += $this->velocity_x * self::DT;
        $this->coordinate_y += $this->velocity_y * self::DT;
        $this->coordinate_z += $this->velocity_z * self::DT;
    }
}
