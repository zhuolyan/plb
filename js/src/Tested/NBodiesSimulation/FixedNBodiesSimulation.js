import {NBodySimulationMixin} from "./NBodySimulationMixin.js";

export class FixedNBodiesSimulation
{
    bodies;
    stepCounts;

    constructor(stepCounts)
    {
        Object.assign(FixedNBodiesSimulation.prototype, NBodySimulationMixin);

        this.stepCounts = stepCounts;
        this.bodies     = new Array(this._BODY_COUNT);
        this.init();
    }
    run()
    {
        this.simulate();

        return this.bodies;
    }
}