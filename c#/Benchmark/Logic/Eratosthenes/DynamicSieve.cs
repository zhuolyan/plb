namespace Benchmark.Logic.Eratosthenes;

public class DynamicSieve : AbstractSieve
{
    public DynamicSieve(int size)
    {
        this.Size    = size;
        this.IsPrime = new List<bool>();
    }

    protected override IList<bool> IsPrime { get; }
}
