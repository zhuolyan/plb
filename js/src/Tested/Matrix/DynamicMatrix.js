import {MatrixMultiplicationMixin} from "./MatrixMultiplicationMixin.js";

export class DynamicMatrix
{
    value;
    size

    constructor(size, feelRand)
    {
        Object.assign(DynamicMatrix.prototype, MatrixMultiplicationMixin);
        this.value = [];
        this.size  = size;

        for (let i = 0; i < this.size; i++) {
            this.value[i] = [];
            for (let j = 0; j < this.size; j++) {
                this.value[i][j] = feelRand ? this.getRandomInt(0, 255) : 0;
            }
        }
    }
}