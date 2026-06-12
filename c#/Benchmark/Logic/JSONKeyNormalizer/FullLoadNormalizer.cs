using System.Text.Json;

namespace Benchmark.Logic.JSONKeyNormalizer;

public class FullLoadNormalizer : AbstractNormalizer
{
    private          Dictionary<string, object> _input = new();
    private readonly Dictionary<string, string> _result = new();

    public void Run()
    {
        string data = File.ReadAllText(AbstractNormalizer.INPUT_FILE) ?? throw new InvalidOperationException();
        this._input = JsonSerializer.Deserialize<Dictionary<string, object>>(data) ?? throw new InvalidOperationException();

        this.RecursiveNormalize(this._input);

        File.WriteAllText(AbstractNormalizer.OUTPUT_FILE, JsonSerializer.Serialize(this._result));
    }

    private void RecursiveNormalize(Dictionary<string, object> data, string parentKey = "")
    {
        parentKey = this.PrepareParentKey(parentKey);

        foreach ((string key, object value) in data) {
            string currentKey = $"{parentKey}-{key}";

            if (value is Dictionary<string, object> dict) {
                this.RecursiveNormalize(dict, currentKey);
            } else {
                this._result[this.Normalize(currentKey)] = (string)value;
            }
        }
    }
}
