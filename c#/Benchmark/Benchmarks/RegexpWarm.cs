using System.Text.RegularExpressions;

using Benchmark.Logic.Regexp;

using BenchmarkDotNet.Attributes;

namespace Benchmark.Benchmarks;

[SimpleJob(10, 1_000, 1)]
public class RegexpWarm
{
    [ParamsSource(typeof(DataProvider), nameof(DataProvider.Regexp))]
    public int Size;

    [Benchmark]
    public Match Generated()
    {
        string str = new string('a', this.Size) + "b";

        return PanicRegexp.Pattern().Match(str);
    }

    [Benchmark]
    public Match Classic()
    {
        string str = new string('a', this.Size) + "b";

        return new Regex("/^(a+)+$/").Match(str);
    }
}
