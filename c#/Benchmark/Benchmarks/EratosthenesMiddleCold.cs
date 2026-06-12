using Benchmark.Logic.Eratosthenes;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class EratosthenesMiddleCold
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.EratosthenesMiddle))]
    public int Size;

    [Benchmark]
    public void FixedSieve()
    {
        new FixedSieve(this.Size).Sieve();
    }

    [Benchmark]
    public void DynamicSieve()
    {
        new DynamicSieve(this.Size).Sieve();
    }
}
