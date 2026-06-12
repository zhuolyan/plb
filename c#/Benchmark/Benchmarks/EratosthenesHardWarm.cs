using Benchmark.Logic.Eratosthenes;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class EratosthenesHardWarm
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.EratosthenesHard))]
    public int Size;

    [Benchmark]
    public int Fixed()
    {
        return new FixedSieve(this.Size).Sieve();
    }

    [Benchmark]
    public int Dynamic()
    {
        return new DynamicSieve(this.Size).Sieve();
    }
}
