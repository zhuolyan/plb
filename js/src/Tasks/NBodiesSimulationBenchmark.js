import {DynamicNBodiesSimulation} from "../Tested/NBodiesSimulation/DynamicNBodiesSimulation.js";
import {FixedNBodiesSimulation} from "../Tested/NBodiesSimulation/FixedNBodiesSimulation.js";
import {dataProvider} from "../helpers.js";

export class NBodiesSimulationBenchmark
{
    fixedResult   = [];
    dynamicResult = [];

    benchColdDynamicSimulationMiddle(size)
    {
        this.dynamicSimulation(size);
    }

    benchColdFixedSimulationMiddle(size)
    {
        this.fixedSimulation(size);
    }

    benchWarmDynamicSimulationMiddle(size)
    {
        this.dynamicSimulation(size);
    }

    benchWarmFixedSimulationMiddle(size)
    {
        this.fixedSimulation(size);
    }

    benchColdDynamicSimulationHard(size)
    {
        this.dynamicSimulation(size);
    }

    benchColdFixedSimulationHard(size)
    {
        this.fixedSimulation(size);
    }

    benchWarmDynamicSimulationHard(size)
    {
        this.dynamicSimulation(size);
    }

    benchWarmFixedSimulationHard(size)
    {
        this.fixedSimulation(size);
    }

    static hardProvider()
    {
        return dataProvider(144_000, 1_584_000, 144_000);
    }

    static middleProvider()
    {
        return dataProvider(240, 144_000, 144_000);
    }

    dynamicSimulation(size)
    {
        this.dynamicResult = new DynamicNBodiesSimulation(size).run();
    }

    fixedSimulation(size)
    {
        this.fixedResult = new FixedNBodiesSimulation(size).run();
    }
}