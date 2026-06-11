import {dataProvider} from "../helpers.js";

export class RegexpBenchmark
{
    static _PATTERN = /^(a+)+$/;
    _result;

    static defaultDataProvider()
    {
        return dataProvider(255, 1000)
    }

    benchCold(size)
    {
        const str = "a".repeat(size) + "b";

        this._result = RegexpBenchmark._PATTERN.test(str);
    }

    benchWarm(size)
    {
        this.benchCold(size);
    }
}