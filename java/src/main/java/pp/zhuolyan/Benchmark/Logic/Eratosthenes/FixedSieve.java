package pp.zhuolyan.Benchmark.Logic.Eratosthenes;

public class FixedSieve
{
    private final boolean[] isPrime;
    private final int       size;

    public FixedSieve(int size)
    {
        this.size    = size;
        this.isPrime = new boolean[this.size + 1];
    }

    public int sieve()
    {
        for (int i = 2; i <= this.size; i++) {
            this.isPrime[i] = true;
        }

        int limit = (int) Math.sqrt(this.size);

        for (int p = 2; p <= limit; p++) {
            // ReSharper disable once InvertIf
            if (this.isPrime[p]) {
                for (int i = p * p; i <= this.size; i += p) {
                    this.isPrime[i] = false;
                }
            }
        }

        int count = 0;

        for (int i = 2; i <= this.size; i++) {
            if (this.isPrime[i]) {
                count++;
            }
        }

        return count;
    }
}
