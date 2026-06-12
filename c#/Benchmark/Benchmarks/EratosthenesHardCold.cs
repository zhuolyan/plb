using Benchmark.Logic.Eratosthenes;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class EratosthenesHardCold
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.EratosthenesHard))]
    public int Size;

    [Benchmark]
    public void FixedSieve() => new FixedSieve(this.Size).Sieve();

    [Benchmark]
    public void DynamicSieve() => new FixedSieve(this.Size).Sieve();
}
