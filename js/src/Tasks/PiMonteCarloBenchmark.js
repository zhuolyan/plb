import {dataProvider} from "../helpers.js";

export class PiMonteCarloBenchmark
{
    pi;

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
        this.pi = this.calculate(size);
    }

    benchWarmPiMonteCarloEasy(size)
    {
        this.pi = this.calculate(size);
    }

    benchColdPiMonteCarloMiddle(size)
    {
        this.pi = this.calculate(size);
    }

    benchWarmPiMonteCarloMiddle(size)
    {
        this.pi = this.calculate(size);
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