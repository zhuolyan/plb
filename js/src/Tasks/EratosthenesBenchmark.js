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
        return new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveEasy(size)
    {
        return new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveEasy(size)
    {
        return  new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveEasy(size)
    {
        return new DynamicSieve(size).sieve();
    }

    //midle
    benchColdFixedSieveMiddle(size)
    {
        return new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveMiddle(size)
    {
        return new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveMiddle(size)
    {
        return new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveMiddle(size)
    {
        return new DynamicSieve(size).sieve();
    }

    //hard
    benchColdFixedSieveHard(size)
    {
        return new FixedSieve(size).sieve();
    }

    benchColdDynamicSieveHard(size)
    {
        return new DynamicSieve(size).sieve();
    }

    benchWarmFixedSieveHard(size)
    {
        return new FixedSieve(size).sieve();
    }

    benchWarmDynamicSieveHard(size)
    {
        return new DynamicSieve(size).sieve();
    }
}