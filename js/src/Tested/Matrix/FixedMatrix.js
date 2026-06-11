import {MatrixMultiplicationMixin} from "./MatrixMultiplicationMixin.js";

export class FixedMatrix
{
    value;
    size

    constructor(size, feelRand)
    {
        Object.assign(FixedMatrix.prototype, MatrixMultiplicationMixin);
        this.size  = size;
        this.value = new Array(this.size);

        for (let i = 0; i < this.size; i++) {
            this.value[i] = new Array(this.size);
            for (let j = 0; j < this.size; j++) {
                this.value[i][j] = feelRand ? this.getRandomInt(0, 255) : 0;
            }
        }
    }
}