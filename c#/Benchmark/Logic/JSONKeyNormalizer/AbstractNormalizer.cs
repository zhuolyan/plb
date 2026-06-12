using System.Text.RegularExpressions;

namespace Benchmark.Logic.JSONKeyNormalizer;

public abstract partial class AbstractNormalizer
{
    protected string InputPath  => Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "..", "..", "..", "..", "..", "..", "..", "..", "..", "domains.json");
    protected string OutputPath => Path.Combine(AppDomain.CurrentDomain.BaseDirectory, "..", "..", "..", "..", "..", "..", "..", "..", "json-normalized.json");

    [GeneratedRegex("[_-]", RegexOptions.IgnoreCase | RegexOptions.Compiled)]
    protected static partial Regex SplitRegexp();

    protected string PrepareParentKey(string parent)
    {
        return string.IsNullOrWhiteSpace(parent) ? string.Empty : $"{parent}-";
    }

    protected string Normalize(string input)
    {
        string[] parts = AbstractNormalizer.SplitRegexp().Split(input);

        IEnumerable<string> capitalizedParts = parts.Select(part => char.ToUpper(part[0]) + part[1..]);

        string combined = string.Concat(capitalizedParts);

        return char.ToLower(combined[0]) + combined[1..];
    }
}
