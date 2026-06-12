using Benchmark.Logic.Matrix;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class MatrixMultiplicationWarmMiddle
{
    public DynamicMatrix? DynamicResult;

    public FixedMatrix? FixedResult;

    [ParamsSource(typeof(DataProvider), nameof(DataProvider.MatrixMiddle))]
    public int Size;

    [Benchmark]
    public void Fixed()
    {
        FixedMatrix first  = new(this.Size, true);
        FixedMatrix second = new(this.Size, true);
        this.FixedResult = first.Multiplication(second);
    }

    [Benchmark]
    public void Dynamic()
    {
        DynamicMatrix first  = new(this.Size, true);
        DynamicMatrix second = new(this.Size, true);
        this.DynamicResult = first.Multiplication(second);
    }
}
