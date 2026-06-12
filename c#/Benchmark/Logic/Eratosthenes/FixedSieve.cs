namespace Benchmark.Logic.Eratosthenes;

public class FixedSieve : AbstractSieve
{
    public FixedSieve(int size)
    {
        this.Size    = size;
        this.IsPrime = new bool[this.Size + 1];
    }

    protected override IList<bool> IsPrime { get; }
}
