using Benchmark.Logic.JSONKeyNormalizer;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class JSONNormalizerCold
{
    [Benchmark]
    public void FullLoad()
    {
        new FullLoadNormalizer().Run();
    }
}
