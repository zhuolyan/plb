using Benchmark.Logic.PiMonteCarlo;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class PiMonteCarloColdEasy
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.PiMonteCarloEasy))]
    public int Size;

    [Benchmark]
    public double Calculate()
    {
        return PiMonteCarlo.Calculate(this.Size);
    }
}
