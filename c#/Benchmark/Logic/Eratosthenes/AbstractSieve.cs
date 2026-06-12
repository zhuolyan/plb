namespace Benchmark.Logic.Eratosthenes;

public abstract class AbstractSieve
{
    protected abstract IList<bool> IsPrime { get; }
    protected          int         Size    { get; init; }

    public int Sieve()
    {
        for (int i = 2; i <= this.Size; i++) {
            this.IsPrime[i] = true;
        }

        int limit = (int)Math.Sqrt(this.Size);

        for (int p = 2; p <= limit; p++) {
            // ReSharper disable once InvertIf
            if (this.IsPrime[p]) {
                for (int i = p * p; i <= this.Size; i += p) {
                    this.IsPrime[i] = false;
                }
            }
        }

        int count = 0;

        for (int i = 2; i <= this.Size; i++) {
            if (this.IsPrime[i]) {
                count++;
            }
        }

        return count;
    }
}
