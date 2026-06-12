import {dataProvider} from "../helpers.js";

export class PiMonteCarloBenchmark
{
    static midletDataProvider()
    {
        return dataProvider(1_000_000, 1_000_000_000, 1_000_000);
    }

    static easyDataProvider()
    {
        return dataProvider(1_000, 1_000_000, 1_000);
    }

    benchColdPiMonteCarloEasy(size)
    {
        return this.calculate(size);
    }

    benchWarmPiMonteCarloEasy(size)
    {
        return this.calculate(size);
    }

    benchColdPiMonteCarloMiddle(size)
    {
        return this.calculate(size);
    }

    benchWarmPiMonteCarloMiddle(size)
    {
        return this.calculate(size);
    }

    calculate(size)
    {
        let inside = 0;
        for (let i = 0; i < size; i++) {
            const x = Math.random();
            const y = Math.random();

            if ((x * x + y * y) <= 1.0) {
                inside++;
            }
        }

        return 4 * (inside / size);
    }
}