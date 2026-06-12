using Benchmark.Logic.NBodySimulation;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class NBodySimulationColdMiddle
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
