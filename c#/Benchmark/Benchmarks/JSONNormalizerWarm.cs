using Benchmark.Logic.JSONKeyNormalizer;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class JSONNormalizerWarm
{
    [Benchmark]
    public void FullLoad()
    {
        new FullLoadNormalizer().Run();
    }
}
