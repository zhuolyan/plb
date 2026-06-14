package pp.zhuolyan.Benchmark.Logic.Eratosthenes;

import java.util.ArrayList;

public class DynamicSieve
{
    private final ArrayList<Boolean> isPrime;
    private final int                size;

    public DynamicSieve(int size)
    {
        this.size    = size;
        this.isPrime = new ArrayList<>();
    }

    public int sieve()
    {
        for (int i = 0; i <= this.size; i++) {
            this.isPrime.add(true);
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
