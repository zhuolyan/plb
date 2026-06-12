using Benchmark.Logic.Eratosthenes;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class EratosthenesMiddleWarm
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
        new FixedSieve(this.Size).Sieve();
    }
}
