using Benchmark.Logic.Matrix;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class MatrixMultiplicationColdEasy
{
    public DynamicMatrix? DynamicResult;

    public FixedMatrix? FixedResult;

    [ParamsSource(typeof(DataProvider), nameof(DataProvider.MatrixEasy))]
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
