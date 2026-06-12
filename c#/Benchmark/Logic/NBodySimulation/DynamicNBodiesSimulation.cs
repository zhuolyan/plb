namespace Benchmark.Logic.NBodySimulation;

public class DynamicNBodiesSimulation : AbstractNBodySimulation
{
    public DynamicNBodiesSimulation(int stepsCount)
    {
        this.Size = stepsCount;

        this.Init();
    }

    protected override IList<Body> Bodies { get; } = [];

    private void Init()
    {
        for (int i = 0; i < AbstractNBodySimulation.BODY_COUNT; i++) {
            this.Bodies.Add(new());
        }
    }

    public IList<Body> Run()
    {
        this.Simulate();

        return this.Bodies;
    }
}
