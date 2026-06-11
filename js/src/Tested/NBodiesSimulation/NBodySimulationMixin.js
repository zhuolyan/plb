import {Body} from "./Body.js";

export const NBodySimulationMixin = {
    _BODY_COUNT: 5, init()
    {
        for (let i = 0; i < this._BODY_COUNT; i++) {
            this.bodies[i] = new Body();
        }
    }, simulate()
    {
        for (let j = 0; j < this.stepsCount; j++) {
            this.forceCalculation();
            this.positionIntegration()
        }
    }, positionIntegration()
    {
        for (const key in this.bodies) {
            this.bodies[key].positionIntegration();
        }
    }, forceCalculation()
    {
        for (let i = 0; i < this._BODY_COUNT; i++) {
            for (let j = 0; j < this._BODY_COUNT; j++) {
                if (i === j) {
                    continue;
                }
                const current_body = this.bodies[i];
                const another_body = this.bodies[j];

                current_body.updateVelocity(another_body);
            }
        }
    }
}