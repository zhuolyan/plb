namespace Benchmark.Logic.NBodySimulation;

public class FixedNBodiesSimulation : AbstractNBodySimulation
{
    public FixedNBodiesSimulation(int stepsCount)
    {
        this.Size = stepsCount;
        this.Init();
    }

    protected override Body[] Bodies { get; } = new Body[AbstractNBodySimulation.BODY_COUNT];

    private void Init()
    {
        for (int i = 0; i < AbstractNBodySimulation.BODY_COUNT; i++) {
            this.Bodies[i] = new();
        }
    }

    public IList<Body> Run()
    {
        this.Simulate();

        return this.Bodies;
    }
}
