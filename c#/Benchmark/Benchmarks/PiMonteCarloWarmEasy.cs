using Benchmark.Logic.PiMonteCarlo;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class PiMonteCarloWarmEasy
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.PiMonteCarloEasy))]
    public int Size;

    [Benchmark]
    public double Calculate()
    {
        return PiMonteCarlo.Calculate(this.Size);
    }
}
