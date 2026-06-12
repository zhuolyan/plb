namespace Benchmark.Logic.NBodySimulation;

public class Body
{
    private const    double DT        = 0.01;
    private const    double SOFTENING = 1e-9;
    private readonly double _mass;
    private          double _coordinateX;
    private          double _coordinateY;
    private          double _coordinateZ;
    private          double _velocityX;
    private          double _velocityY;
    private          double _velocityZ;

    public Body()
    {
        this._coordinateX = Random.Shared.NextDouble();
        this._coordinateY = Random.Shared.NextDouble();
        this._coordinateZ = Random.Shared.NextDouble();
        this._velocityX   = Random.Shared.NextDouble();
        this._velocityY   = Random.Shared.NextDouble();
        this._velocityZ   = Random.Shared.NextDouble();
        this._mass        = Random.Shared.NextDouble();
    }

    public void UpdateVelocity(Body another)
    {
        double dx = this._coordinateX - another._coordinateX;
        double dy = this._coordinateY - another._coordinateY;
        double dz = this._coordinateZ - another._coordinateZ;

        double distSq   = Math.Pow(dx, 2) + Math.Pow(dy, 2) + Math.Pow(dz, 2) + Body.SOFTENING;
        double invDist3 = Math.Pow(1.0 / Math.Sqrt(distSq), 3);

        this._velocityX += dx * this._mass * invDist3 * Body.DT;
        this._velocityY += dy * this._mass * invDist3 * Body.DT;
        this._velocityZ += dz * this._mass * invDist3 * Body.DT;
    }

    public void PositionIntegration()
    {
        this._coordinateX = this._velocityX * Body.DT;
        this._coordinateY = this._velocityY * Body.DT;
        this._coordinateZ = this._velocityZ * Body.DT;
    }
}
