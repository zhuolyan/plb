using Benchmark.Logic.Matrix;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class MatrixMultiplicationColdHard
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.MatrixHard))]
    public int Size;

    [Benchmark]
    public FixedMatrix Fixed()
    {
        FixedMatrix first  = new(this.Size, true);
        FixedMatrix second = new(this.Size, true);

        return first.Multiplication(second);
    }

    [Benchmark]
    public DynamicMatrix Dynamic()
    {
        DynamicMatrix first  = new(this.Size, true);
        DynamicMatrix second = new(this.Size, true);

        return first.Multiplication(second);
    }
}
