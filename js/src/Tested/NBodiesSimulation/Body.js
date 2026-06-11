export class Body
{
    static _DT        = 0.1;
    static _SOFTENING = 1e-9;

    coordinate_x;
    coordinate_y;
    coordinate_z;

    velocity_x;
    velocity_y;
    velocity_z;

    mass;

    constructor()
    {
        this.coordinate_x = Math.random();
        this.coordinate_y = Math.random();
        this.coordinate_z = Math.random();

        this.mass = Math.random();
    }

    updateVelocity(another)
    {
        const dx = this.coordinate_x - another.coordinate_x;
        const dy = this.coordinate_y - another.coordinate_y;
        const dz = this.coordinate_z - another.coordinate_z;

        const distSq = Math.pow(dx, 2) + Math.pow(dy, 2) + Math.pow(dz, 2) + Body._SOFTENING;

        const invDist3 = Math.pow(1.0 / Math.sqrt(distSq), 3);

        this.velocity_x = dx * another.mass * invDist3 * Body._DT;
        this.velocity_y = dy * another.mass * invDist3 * Body._DT;
        this.velocity_z = dz * another.mass * invDist3 * Body._DT;
    }

    positionIntegration()
    {
        this.coordinate_x += this.velocity_x * Body._DT;
        this.coordinate_y += this.velocity_y * Body._DT;
        this.coordinate_z += this.velocity_z * Body._DT;
    }
}