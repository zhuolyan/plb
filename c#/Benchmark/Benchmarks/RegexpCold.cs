using System.Text.RegularExpressions;

using Benchmark.Logic.Regexp;

using BenchmarkDotNet.Attributes;
using BenchmarkDotNet.Engines;

namespace Benchmark.Benchmarks;

[SimpleJob(RunStrategy.ColdStart, 10, 0, 1)]
public class RegexpCold
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
