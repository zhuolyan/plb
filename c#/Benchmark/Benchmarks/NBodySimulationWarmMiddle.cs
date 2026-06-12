using Benchmark.Logic.NBodySimulation;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class NBodySimulationWarmMiddle
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.NBodiesMiddle))]
    public int Size;

    [Benchmark]
    public IList<Body> Fixed()
    {
        return new FixedNBodiesSimulation(this.Size).Run();
    }

    [Benchmark]
    public IList<Body> Dynamic()
    {
        return new DynamicNBodiesSimulation(this.Size).Run();
    }
}
