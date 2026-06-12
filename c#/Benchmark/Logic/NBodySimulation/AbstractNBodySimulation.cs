namespace Benchmark.Logic.NBodySimulation;

public abstract class AbstractNBodySimulation
{
    protected const    int         BODY_COUNT = 5;
    protected          int         Size;
    protected abstract IList<Body> Bodies { get; }

    protected void Simulate()
    {
        for (int i = 0; i < this.Size; i++) {
            this.ForceCalculation();
            this.PositionIntegration();
        }
    }

    private void PositionIntegration()
    {
        foreach (Body body in this.Bodies) {
            body.PositionIntegration();
        }
    }

    private void ForceCalculation()
    {
        for (int i = 0; i < AbstractNBodySimulation.BODY_COUNT; i++) {
            for (int j = 0; j < AbstractNBodySimulation.BODY_COUNT; j++) {
                if (i == j) {
                    continue;
                }

                Body currentBody = this.Bodies[i];
                Body anotherBody = this.Bodies[j];

                currentBody.UpdateVelocity(anotherBody);
            }
        }
    }
}
