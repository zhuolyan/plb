using Benchmark.Logic.Eratosthenes;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class EratosthenesEasyCold
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.EratosthenesEasy))]
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
