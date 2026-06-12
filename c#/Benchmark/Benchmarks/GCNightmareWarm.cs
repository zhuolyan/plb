using System.Dynamic;

using Benchmark.Logic.GCNightmare;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class GCNightmareWarm
{
    public dynamic? Result;

    [ParamsSource(typeof(DataProvider), nameof(DataProvider.GCNightmare))]
    public int Size;

    [Benchmark]
    public dynamic? Easy()
    {
        for (int i = 0; i < this.Size; i++) {
            Dictionary<string, string> arr = new();
            arr[$"key{i}"] = $"value{i}";

            this.Result = arr;
        }

        return this.Result;
    }

    [Benchmark]
    public dynamic? Middle()
    {
        for (int i = 0; i < this.Size; i++) {
            this.Result      = new ExpandoObject();
            this.Result.Test = "test";
        }

        return this.Result;
    }

    [Benchmark]
    public dynamic? Hard()
    {
        for (int i = 0; i < this.Size; i++) {
            this.Result            = new Node();
            this.Result.Left       = new Node();
            this.Result.Right      = new Node();
            this.Result.Right.Left = this.Result;
            this.Result.Left.Right = this.Result.Left;
        }

        return this.Result;
    }
}
