using System.Text.Json;

namespace Benchmark.Logic.JSONKeyNormalizer;

public class FullLoadNormalizer : AbstractNormalizer
{
    private readonly Dictionary<string, string>      _result = new();
    private          Dictionary<string, JsonElement> _input  = new();

    public void Run()
    {
        string data = File.ReadAllText(this.InputPath) ?? throw new InvalidOperationException();
        this._input = JsonSerializer.Deserialize<Dictionary<string, JsonElement>>(data) ?? throw new InvalidOperationException();

        this.RecursiveNormalize(this._input);
        JsonSerializerOptions options = new() { WriteIndented = true };
        File.WriteAllText(this.OutputPath, JsonSerializer.Serialize(this._result, options));
    }

    private void RecursiveNormalize(Dictionary<string, JsonElement> data, string parentKey = "")
    {
        parentKey = this.PrepareParentKey(parentKey);

        foreach ((string key, JsonElement value) in data) {
            string currentKey = $"{parentKey}{key}";

            if (value.ValueKind == JsonValueKind.Object) {
                this.RecursiveNormalize(value.Deserialize<Dictionary<string, JsonElement>>()!, currentKey);
            } else {
                this._result.TryAdd(this.Normalize(currentKey), value.GetString()!);
            }
        }
    }
}
