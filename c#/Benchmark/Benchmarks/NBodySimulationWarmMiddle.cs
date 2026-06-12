using Benchmark.Logic.NBodySimulation;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class NBodySimulationWarmMiddle
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.NBodiesMiddle))]
    public int Size;

    [Benchmark]
    public void FixedSieve()
    {
        new FixedNBodiesSimulation(this.Size).Run();
    }

    [Benchmark]
    public void DynamicSieve()
    {
        new DynamicNBodiesSimulation(this.Size).Run();
    }
}
