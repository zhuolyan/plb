package pp.zhuolyan.Benchmark.Banchmarks;

import org.openjdk.jmh.annotations.*;
import pp.zhuolyan.Benchmark.Logic.Eratosthenes.DynamicSieve;
import pp.zhuolyan.Benchmark.Logic.Eratosthenes.FixedSieve;

@State(Scope.Thread)
public class Eratosthenes
{
    @Param({})
    public int size;

    @Benchmark
    @Warmup
    public int fixed()
    {
        return new FixedSieve(this.size).sieve();
    }

    @Benchmark
    public int dynamic()
    {
        return new DynamicSieve(this.size).sieve();
    }
}
