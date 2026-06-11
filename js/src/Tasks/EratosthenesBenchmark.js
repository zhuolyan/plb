import {FixedSieve} from "../Tested/Eratoethens/FixedSieve.js";
import {DynamicSieve} from "../Tested/Eratoethens/DynamicSieve.js";
import {dataProvider} from "../helpers.js";

export class EratosthenesBenchmark
{
    static easyDataProvider()
    {
        return dataProvider(10, 60_000, 10)
    }

    static middleDataProvider()
    {
        return dataProvider(60_010, 8_200_000, 20_000)
    }

    static hardDataProvider()
    {
        return dataProvider(8_200_000, 1_000_000_000, 2_000_000)
    }

    //easy
    benchColdFixedSieveEasy(size)
    {
        new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveEasy(size)
    {
        new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveEasy(size)
    {
        new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveEasy(size)
    {
        new DynamicSieve(size).sieve();
    }

    //midle
    benchColdFixedSieveMiddle(size)
    {
        new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveMiddle(size)
    {
        new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveMiddle(size)
    {
        new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveMiddle(size)
    {
        new DynamicSieve(size).sieve();
    }

    //hard
    benchColdFixedSieveHard(size)
    {
        new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveHard(size)
    {
        new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveHard(size)
    {
        new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveHard(size)
    {
        new DynamicSieve(size).sieve();
    }
}