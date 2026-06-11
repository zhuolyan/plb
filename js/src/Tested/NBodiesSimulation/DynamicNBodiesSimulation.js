import {NBodySimulationMixin} from "./NBodySimulationMixin.js";

export class DynamicNBodiesSimulation
{
    bodies;
    stepCounts;

    constructor(stepCounts)
    {
        Object.assign(DynamicNBodiesSimulation.prototype, NBodySimulationMixin);

        this.stepCounts = stepCounts;
        this.bodies     = [];
        this.init();
    }

    run()
    {
        this.simulate();

        return this.bodies;
    }
}