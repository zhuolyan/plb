import {dataProvider} from "../helpers.js";

export class RegexpBenchmark
{
    static _PATTERN = /^(a+)+$/;

    static defaultDataProvider()
    {
        return dataProvider(255, 1000)
    }

    benchCold(size)
    {
        const str = "a".repeat(size) + "b";

        return RegexpBenchmark._PATTERN.test(str);
    }

    benchWarm(size)
    {
        return this.benchCold(size);
    }
}