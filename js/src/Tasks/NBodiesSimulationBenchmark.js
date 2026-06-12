import {DynamicNBodiesSimulation} from "../Tested/NBodiesSimulation/DynamicNBodiesSimulation.js";
import {FixedNBodiesSimulation} from "../Tested/NBodiesSimulation/FixedNBodiesSimulation.js";
import {dataProvider} from "../helpers.js";

export class NBodiesSimulationBenchmark
{
    static hardProvider()
    {
        return dataProvider(144_000, 1_584_000, 144_000);
    }

    static middleProvider()
    {
        return dataProvider(240, 144_000, 240);
    }

    benchColdDynamicSimulationMiddle(size)
    {
        return this.dynamicSimulation(size);
    }

    benchColdFixedSimulationMiddle(size)
    {
        return this.fixedSimulation(size);
    }

    benchWarmDynamicSimulationMiddle(size)
    {
        return this.dynamicSimulation(size);
    }

    benchWarmFixedSimulationMiddle(size)
    {
        return this.fixedSimulation(size);
    }

    benchColdDynamicSimulationHard(size)
    {
        return this.dynamicSimulation(size);
    }

    benchColdFixedSimulationHard(size)
    {
        return this.fixedSimulation(size);
    }

    benchWarmDynamicSimulationHard(size)
    {
        return this.dynamicSimulation(size);
    }

    benchWarmFixedSimulationHard(size)
    {
        return this.fixedSimulation(size);
    }

    dynamicSimulation(size)
    {
        return new DynamicNBodiesSimulation(size).run();
    }

    fixedSimulation(size)
    {
        return new FixedNBodiesSimulation(size).run();
    }
}