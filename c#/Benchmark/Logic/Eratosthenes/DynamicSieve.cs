namespace Benchmark.Logic.Eratosthenes;

public class DynamicSieve : AbstractSieve
{
    public DynamicSieve(int size)
    {
        this.Size    = size;
        this.IsPrime = new List<bool>();
        this.Init();
    }

    protected override IList<bool> IsPrime { get; }

    private void Init()
    {
        for (int i = 0; i <= this.Size; i++) {
            this.IsPrime.Add(false);
        }
    }
}
