package pp.zhuolyan.Benchmark.Logic.Eratosthenes;

import java.util.ArrayList;

public class DynamicSieve
{
    private final ArrayList<Boolean> isPrime;
    private       int                size = 0;

    public DynamicSieve(int size)
    {
        this.size    = size;
        this.isPrime = new ArrayList<>(this.size + 1);
    }

    public int Sieve()
    {
        for (int i = 2; i <= this.size; i++) {
            this.isPrime.set(i, true);
        }

        int limit = (int) Math.sqrt(this.size);

        for (int p = 2; p <= limit; p++) {
            // ReSharper disable once InvertIf
            if (this.isPrime.get(p)) {
                for (int i = p * p; i <= this.size; i += p) {
                    this.isPrime.set(i, false);
                }
            }
        }

        int count = 0;

        for (int i = 2; i <= this.size; i++) {
            if (this.isPrime.get(i)) {
                count++;
            }
        }

        return count;
    }
}
