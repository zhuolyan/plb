using System.Text.Json;

namespace Benchmark.Logic.JSONKeyNormalizer;

public class ReadFromStreamNormalizer : AbstractNormalizer, IDisposable, IAsyncDisposable
{
        private Dictionary<string, string> Result = new();

    public void Run()
    {
        FileStream fs = File.OpenRead(AbstractNormalizer.INPUT_FILE);
        
        JsonSerializer.Deserialize<Dictionary<string, object>>(fs);

    }

    private void RecursiveNormalize(Dictionary<string, object> data, string parentKey = "")
    {
        parentKey = this.PrepareParentKey(parentKey);

        foreach ((string key, object value) in data) {
            string currentKey = $"{parentKey}-{key}";

            if (value is Dictionary<string, object> dict) {
                this.RecursiveNormalize(dict, currentKey);
            } else {
                this.Result[this.Normalize(currentKey)] = (string)value;
            }
        }
    }

    public void Dispose()
    {
        GC.SuppressFinalize(this);
        this._input.Dispose();
    }

    public async ValueTask DisposeAsync()
    {
        GC.SuppressFinalize(this);
        await this._input.DisposeAsync();
    }
}
