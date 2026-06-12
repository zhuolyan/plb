using System.Text.RegularExpressions;

namespace Benchmark.Logic.Regexp;

public partial class PanicRegexp
{
    [GeneratedRegex("/^(a+)+$/")]
    public static partial Regex Pattern();
}
