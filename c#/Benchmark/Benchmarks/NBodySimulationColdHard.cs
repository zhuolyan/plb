using Benchmark.Logic.NBodySimulation;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class NBodySimulationColdHard
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.NBodiesHard))]
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
