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
    public void Generated()
    {
        string str    = new string('a', this.Size) + "b";
        Match  result = PanicRegexp.Pattern().Match(str);
    }

    [Benchmark]
    public void Classic()
    {
        string str    = new string('a', this.Size) + "b";
        Match  result = new Regex("/^(a+)+$/").Match(str);
    }
}
