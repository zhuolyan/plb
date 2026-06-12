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
