using System.Text.RegularExpressions;

namespace Benchmark.Logic.JSONKeyNormalizer;

public abstract partial class AbstractNormalizer
{
    protected const string INPUT_FILE  = "../../../../../domains.json";
    protected const string OUTPUT_FILE = "../../../../json-normalized.json";

    [GeneratedRegex("[_-]", RegexOptions.IgnoreCase | RegexOptions.Compiled)]
    protected static partial Regex SplitRegexp();

    protected string PrepareParentKey(string parent)
    {
        return string.IsNullOrEmpty(parent) ? string.Empty : $"{parent}-";
    }

    protected string Normalize(string input)
    {
        string[] parts = AbstractNormalizer.SplitRegexp().Split(input);

        IEnumerable<string> capitalizedParts = parts.Select(part => char.ToUpper(part[0]) + part[1..]);

        string combined = string.Concat(capitalizedParts);

        return char.ToLower(combined[0]) + combined[1..];
    }
}
